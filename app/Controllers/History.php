<?php

namespace App\Controllers;

class History extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Ktrains | History",
            "active" => "history"
        ];
        return view('home/history', $data);
    }

    //--------------------------------------------------------------------

}
