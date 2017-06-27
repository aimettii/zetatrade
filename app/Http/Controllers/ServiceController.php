<?php

namespace App\Http\Controllers;

use Facades\App\Services\OrderService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function get($service_name)
    {
        return OrderService::getServiceOrders($service_name);
    }

}
