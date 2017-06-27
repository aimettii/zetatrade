<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Input;
use Facades\App\Services\OrderService;
use Validator;

class OrderController extends Controller
{

    /**
     * Создать новый заказ и запустить систему резерваций, ассортимента `BOOKING`,
     * при условии: наличия этого ассортимента в заказе
     *
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
       $validator = Validator::make($request->all(), [
           'tractor.number' => 'required_without:tractor.id',
           'trailer.number' => 'required_without:trailer.id',
           'tractor.id' => 'integer|exists:vehicles,id,tractor,1',
           'trailer.id' => 'integer|exists:vehicles,id,tractor,0',
           'counterpartie.name' => 'required_without:counterpartie.id',
           'counterpartie.id' => 'integer|exists:counterparties,id',
           'border.id' => 'required|integer|exists:borders,id',
           'phones' => 'required|min:1',
           'phones.*.number' => 'required_without:phones.*.id|distinct',
           'phones.*.id' => 'integer|exists:phones,id|distinct',
           'sales' => 'required|min:1|max:2|assortment',
           'sales.*.assortment_id' => 'required|integer|exists:assortments,id|distinct',
           'comment' => 'present'
        ]);

        if ($validator->fails()) {
            return ['FAIL VALIDATE'];
        }

        $order = OrderService::create();

        return $order;
    }

    public function get($orderId = null)
    {
        return OrderService::get($orderId);
    }

    public function searchData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'field' => 'required',
            'data' => 'required'
        ]);

        if ($validator->fails()) {
            return ['FAIL VALIDATE'];
        }

        $found = OrderService::searchData();

        return $found;
    }
}
