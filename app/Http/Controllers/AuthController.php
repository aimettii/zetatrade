<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Авторизация пользователя
     *
     * @TODO: Помимо стандартного вывода данных, выводит так же данные для Toast уведомления, только в этом контроллере
     * @TODO: После авторизации, функцию отправки уведомлений выполняет Laravel - Notifications, а принимает Echo.js
     *
     * @param Request $request
     * @return array
     */
    public function login(Request $request){

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], false)) {
            $status = 'success';
            $toast = ['toast' => [
                'type' => 'success',
                'title' => 'Вы успешно авторизовались',
                'text' => 'Можете начинать работу :)'
            ]];

            $user = new UserController();
            $user_data = $user->getUserData();
        }else{
            $status = 'failure';
            $user_data = ['user' => false];
            $toast = ['toast' => [
                'type' => 'error',
                'title' => 'Неправильный логин или пароль',
                'text' => 'Попробуйте снова'
            ]];
        }

        return ['status' => $status] + $toast + $user_data;
    }


    /**
     * Выход пользователя
     *
     * @return array
     */
    public function logout(){

        Auth::logout();

        $toast = ['toast' => [
            'type' => 'info',
            'title' => 'До скорой встречи :)',
            'text' => ''
        ]];

        return ['status' => 'success'] + $toast;
    }
}
