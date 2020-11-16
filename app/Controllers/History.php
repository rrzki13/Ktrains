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
        $pulang_pergi_tiket = [];
        $pulang_pergi_tiket2 = [];
        $just_pergi = [];
        $big_data = [];
        if ($tiketHistory) {
            foreach ($tiketHistory as $key) {
                if ($key['pulang_pergi']) {
                    $pulang_pergi_tiket[] = $key;
                } else {
                    $just_pergi[] = $key;
                }
            }
            if ($pulang_pergi_tiket) {
                foreach ($pulang_pergi_tiket as $key) {
                    $test = explode("P", $key['no_pesanan']);
                    if (count($test) == 1) {
                        $pulang_pergi_tiket2[] = $key;
                    }
                }

                $big_data = [...$pulang_pergi_tiket2, ...$just_pergi];
            } else {
                $big_data = [...$just_pergi];
            }
        }

        $data = [
            "title" => "Ktrains | History",
            "active" => "history",
            "history" => $big_data
        ];
        return view('home/history', $data);
    }

    //--------------------------------------------------------------------

}
