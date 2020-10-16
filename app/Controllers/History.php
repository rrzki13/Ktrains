<?php

namespace App\Controllers;

use App\Models\TiketOrderModel;

class History extends BaseController
{
    protected $TiketOrderModel;
    public function __construct()
    {   
        $this->TiketOrderModel = new TiketOrderModel();
    }

    public function index()
    {
        $tiketHistory = $this->TiketOrderModel->getMyOrder(session()->get('id'));
        $data = [
            "title" => "Ktrains | History",
            "active" => "history",
            "history" => $tiketHistory
        ];
        return view('home/history', $data);
    }

    //--------------------------------------------------------------------

}
