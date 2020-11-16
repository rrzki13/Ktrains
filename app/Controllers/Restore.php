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
        $pulang_pergi_tiket = [];
        $pulang_pergi_tiket2 = [];
        $just_pergi = [];
        $big_data = [];
        if ($deletedTiket) {
            foreach ($deletedTiket as $key) {
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
        $stationName = [];
        if ($big_data) {
            foreach ($big_data as $key) {
                $stasiunAwal = $this->StasiunModel->getStationByCode($key['stasiun_awal']);
                $stasiunAkhir = $this->StasiunModel->getStationByCode($key['stasiun_akhir']);
                $stationName[] = [
                    "first_station" => $stasiunAwal['station_name'],
                    "last_station" => $stasiunAkhir['station_name']
                ];
            }
        } else {
            $stationName = null;
        }

        $data = [
            "title" => "Ktrains | Restore Tiket",
            "active" => "history",
            "deleted_tiket" => $big_data,
            "station_name" => $stationName
        ];
        return view('home/restore', $data);
    }

    //--------------------------------------------------------------------

}
