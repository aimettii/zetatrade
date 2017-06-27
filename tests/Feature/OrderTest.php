<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class OrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrderCreate()
    {
        Auth::loginUsingId(1);

        $request = [
            'tractor' => [
                'number' => 'LS544546'
            ],
            'trailer' => [
                'number' => 'LS544546'
            ],
            'counterpartie' => [
                'name' => 'BELARUS'
            ],
            'border' => [
                'id' => 1
            ],
            'phones' => [
                [
                    'number' => '4893253399'
                ],
                [
                    'number' => '4893253311'
                ]
            ],
            'sales' => [
                [
                    'assortment_id' => 1,
                    'quantity_codes' => 5
                ],
                [
                    'assortment_id' => 3,
                    'booking_driver_language_id' => 1,
                    'quantity_cargo' => true,
                    'booking_type_id' => 1,
                    'reservation_time' => date("Y-m-d H:i:s")
                ]
            ],
            'comment' => 'First Comment from Operator',
            'files' => [
                UploadedFile::fake()->image('test6.pdf')
            ]
        ];

        $response = $this->call('GET', 'order/create', $request);

        $content = $response->getContent();

        if($response->status() !== 200){
            echo $content;
        }
        $response->assertStatus(200);

        print_r(json_decode($content, true));
    }

}
