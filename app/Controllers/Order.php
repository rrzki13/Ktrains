<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Ktrains | Order",
            "active" => "order"
        ];
        return view('home/order', $data);
    }

    //--------------------------------------------------------------------

}
