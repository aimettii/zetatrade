<?php

namespace App\Services\Exception;


class OrderLogException extends \Exception
{
    public function badArguments(){
        throw new OrderLogException('Переданы неверные аргументы');
    }
}