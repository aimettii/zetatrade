<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Phone;
use App\Models\Sale;
use App\Models\File;
use App\Models\Vehicle;
use App\Models\Counterpartie;
use App\Models\Assortment\AssortmentGroups;
use App\Services\Exception\OrderLogException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Facades\App\Services\VehicleService;
use Facades\App\Services\CounterpartieService;
use Facades\App\Services\ResponseService;


class OrderService extends Kernel
{

    public function get($orderId = null) {
        if($orderId){
            return Order::find($orderId);
        }

        $orders = Order::all()->toArray();

        foreach ($orders as &$order){
            foreach ($order['sales'] as $k => $sale){
                $order['sales'][strtolower($sale['assortment']['group']['name'])] = $sale;
                unset($order['sales'][$k]);
            }
        }

        return $orders;
    }

    /**
     * Добавить новый заказ в БД, со всеми связями
     *
     * @return Order
     */
    public function create(){
        $order = new Order;

        $order->number = $this::generateNumber();
        $order->tractor()->associate(VehicleService::isTractor(true)->firstOrCreate());
        $order->trailer()->associate(VehicleService::isTractor(false)->firstOrCreate());
        $order->counterpartie()->associate(CounterpartieService::firstOrCreate());
        $order->border()->associate($this->request->border['id']);
        $order->action_log = $this::makeLogEntry([
                ['order_created'],
                ['user_message', ['message' => $this->request->comment]]
            ]);
        $order->created_by_user_id = Auth::id();

        $order->save();

        $phoneIds = [];
        foreach ($this->request->phones as $phone){
            $phoneIds[] = isset($phone['id']) ? $phone['id'] : Phone::firstOrCreate($phone)->id;
        }

        $order->phones()->attach($phoneIds);

        $filesIds = [];
        foreach ($this->request->file('files') as $file){
            $file->storeAs('orders', $file->getClientOriginalName());
            $filesIds[] = File::create([
                'name' => 'orders/'.$file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension()
            ])->id;
        }

        $order->files()->attach($filesIds);

        foreach ($this->request->sales as $sale){
            $sale = new Sale($sale);
            $order->sales()->save($sale);
        }

        return $order->load('phones', 'sales', 'files');
    }

    public function searchData(){
        switch ($this->request->field){

            case 'tractor':
                return Vehicle::where('tractor', 1)->
                whereRaw("LOWER(number) like '".strtolower($this->request->data)."%'")->get();

            case 'trailer':
                return Vehicle::where('tractor', 0)->
                    whereRaw("LOWER(number) like '".strtolower($this->request->data)."%'")->get();
                break;

            case 'counterpartie':
                return Counterpartie::whereRaw("LOWER(name) like '".strtolower($this->request->data)."%'")->get();
                break;

            case 'phone':
                return Phone::whereRaw("LOWER(number) like '".strtolower($this->request->data)."%'")->get();
                break;
        }

        return 1;
    }

    public function getServiceOrders($service_name){
        $service = AssortmentGroups::whereRaw("LOWER(name) = '".$service_name."'")->first();

        if(!$service)
        {
            return ResponseService::Error("Услуги `$service_name`, не существует");
        }

        $orders = [];

        foreach ($service->assortments as $assortment){
            foreach ($assortment->sales as $sale){
                $new_order = $sale['order'];
                unset($sale['order']);
                $new_order['sale'] = $sale;
                $orders[] = $new_order;
            }
        }

        return $orders;
    }

    /**
     * Записать или вернуть отформатированные лог данные заказа
     *
     * @string string|array $action
     * @param array $data
     * @param int|bool $orderId
     * @param bool $returnJustOne
     * @return array|mixed|string
     */
    public function makeLogEntry($action, $data = [], $orderId = false, $returnJustOne = false){
        try{
            if(is_array($action)){
                $args = $action;
                $new_log = [];
                $order = null;
                $orderId = $data > 0 ? $data : false;

                if(empty($args)) throw new OrderLogException('badArguments');

                foreach ($args as $k => $arg){
                    if(!isset($arg[0])) throw new OrderLogException('badArguments');

                    $new_action = $arg[0];
                    $new_orderId = $orderId;
                    $new_data = isset($arg[1]) ? $arg[1] : [];

                    if(isset($arg[1]) && !is_array($arg[1])) throw new OrderLogException('badArguments');

                    $new_log[] = $this->makeLogEntry($new_action, $new_data, $new_orderId, true);
                }

                return $orderId ? $this::handleLogWithOrderId($orderId, $new_log, true) : $this::logToJson($new_log);
            }else{
                $new_log = [];

                switch ($action){
                    case 'system_message':
                        $new_log['message'] = '';
                        break;
                    default:
                        $new_log['message'] = '';
                        $new_log['from'] = Auth::id();
                }

                $new_log = ['date' => date("Y-m-d H:i:s"), 'action' => $action] + $data + $new_log;

                if($returnJustOne){
                    return $new_log;
                }

                if($orderId){
                    return $this::handleLogWithOrderId($orderId, $new_log);
                }else{
                    return $this::logToJson([$new_log]);
                }

            }

        }catch(OrderLogException $e){
            $method = $e->getMessage();
            $e->$method();
        }
    }

    /**
     * Генерация уникального номера заказа
     *
     * @return int
     */
    private function generateNumber()
    {
        $orders = Order::all();

        $numbers = collect($orders)->map(function ($item) {
            return $item['number'];
        })->all();

        $min = '1';
        $max = '9';
        for ($i = 1; $i < Config::get('order.number_length'); $i++) {
            $min .= '0';
            $max .= '9';
        }

        while(true){
            $number = mt_rand($min, $max);

            if(!in_array($number, $numbers)){
                break;
            }
        }

        return $number;
    }

    /**
     * Форматировать массив с лог записями в json строку
     *
     * @param array $new_log
     * @return string
     */
    private function logToJson($new_log){
        return json_encode($new_log, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Обновить `action_log` столбец соотвествующего заказа
     *
     * @param int $orderId
     * @param array $new_log
     * @param bool $many
     * @return Order
     */
    private function handleLogWithOrderId($orderId, $new_log, $many = false){
        $order = Order::findOrFail($orderId);

        $action_log = json_decode($order->action_log, true);

        if($many){
            $action_log = $action_log + $new_log;
            foreach ($new_log as $v) {
                $action_log[] = $v;
            }
        }else{
            $action_log[] = $new_log;
        }

        $order->action_log = $this::logToJson($action_log);

        $order->save();

        return $order;
    }
}