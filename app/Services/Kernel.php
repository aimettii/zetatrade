<?php

namespace App\Services;

use Illuminate\Http\Request;

class Kernel
{
    protected $model;
    protected $models_namespace = '\App\\Models\\';
    protected $service_class;
    protected $request;

//    public function __call($name, $args) {
//        return call_user_func_array(array($this->model, $name), $args);
//    }

    public function __construct(Request $request){
        $this->request = $request;
//        $this->service_class = $this->getServiceClass();
//        $this->model = $this->getModel();
    }

    private function getServiceClass(){
        $classes = get_declared_classes();
        $names = explode('\\', $classes[count($classes)-1]);
        return str_replace('Service', '', $names[count($names)-1]);
    }

    private function getModel(){
        $model_class = isset($this->model) ? $this->model : $this->models_namespace.$this->service_class;
        return new $model_class;
    }
}