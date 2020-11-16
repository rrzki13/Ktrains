<?php

namespace App\Controllers;

use App\Models\TiketOrderModel;

class Order extends BaseController
{
    protected $TiketOrderModel;
    public function __construct()
    {
        $this->TiketOrderModel = new TiketOrderModel();
    }

    public function index()
    {
        $dataTiketOrder = $this->TiketOrderModel->getByUserId(session()->get('id'));
        $pulang_pergi_tiket = [];
        $pulang_pergi_tiket2 = [];
        $just_pergi = [];
        $big_data = [];
        if ($dataTiketOrder) {
            $statusOrder = true;
            foreach ($dataTiketOrder as $key) {
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
            }else {
                $big_data = [...$just_pergi];
            }
        } else {
            $statusOrder = false;
        }
        $data = [
            "title" => "Ktrains | Order",
            "active" => "order",
            "orderReceipt" => $statusOrder,
            "dataReceipt" => $big_data
        ];
        return view('home/order', $data);
    }

    //--------------------------------------------------------------------

}
