<?php

namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| MainController
|--------------------------------------------------------------------------
|
| Первый и последний контроллер обрабатывающий вывод представления(view),
| так как фактически - проект состоит из одной страницы, и управляется Vue.js
|
|
*/

use App\Models\Booking\BookingDriverLanguages;
use App\Models\Border;
use Facades\App\Services\OrderService;

class MainController extends Controller
{
    public function __invoke()
    {
        return view('app', [
            'orders' => OrderService::get(),
            'borders' => Border::all(),
            'booking_driver_languages' => BookingDriverLanguages::all()
        ]);
    }
}
