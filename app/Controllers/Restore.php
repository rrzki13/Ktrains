<?php

namespace App\Controllers;

use App\Models\TiketOrderModel;

class Restore extends BaseController
{
    protected $TiketOrderModel;
    public function __construct()
    {
        $this->TiketOrderModel = new TiketOrderModel();
    }

    public function index()
    {
        $data = [
            "title" => "Ktrains | Restore Tiket",
            "active" => "history"
        ];
        return view('home/restore', $data);
    }

    //--------------------------------------------------------------------

}
