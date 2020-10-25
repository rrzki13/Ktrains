<?php

namespace App\Controllers;

use App\Models\TiketOrderModel;
use App\Models\StasiunModel;

class Restore extends BaseController
{
    protected $TiketOrderModel, $StasiunModel;
    public function __construct()
    {
        $this->TiketOrderModel = new TiketOrderModel();
        $this->StasiunModel = new StasiunModel();
    }

    public function index()
    {
        $deletedTiket = $this->TiketOrderModel->getRestoreTiket(session()->get('id'));
        $stationName = [];
        if ($deletedTiket) {
            foreach($deletedTiket as $key) {
                $stasiunAwal = $this->StasiunModel->getStationByCode($key['stasiun_awal']);
                $stasiunAkhir = $this->StasiunModel->getStationByCode($key['stasiun_akhir']);
                $stationName[] = [
                    "first_station" => $stasiunAwal['station_name'],
                    "last_station" => $stasiunAkhir['station_name']
                ];
            }
        }else {
            $stationName = null;
        }

        $data = [
            "title" => "Ktrains | Restore Tiket",
            "active" => "history",
            "deleted_tiket" => $deletedTiket,
            "station_name" => $stationName
        ];
        return view('home/restore', $data);
    }

    //--------------------------------------------------------------------

}
