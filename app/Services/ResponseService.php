<?php

namespace App\Services;


class ResponseService extends Kernel
{
    protected $responseType;

    public function Error($data)
    {
        $this->responseType = 'failure';
        return $this->response($data);
    }

    protected function response($data)
    {
        return ['status' => $this->responseType, 'data' => $data];
    }

}