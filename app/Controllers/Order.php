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
        if ($dataTiketOrder) {
            $statusOrder = true;
        }else {
            $statusOrder = false;
        }
        $data = [
            "title" => "Ktrains | Order",
            "active" => "order",
            "orderReceipt" => $statusOrder,
            "dataReceipt" => $dataTiketOrder
        ];
        return view('home/order', $data);
    }

    //--------------------------------------------------------------------

}
