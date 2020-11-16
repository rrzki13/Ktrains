<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Models\SuccessTransactionModel;
use App\Controllers\BaseController;

class Staff extends BaseController
{
	protected $TiketOrderModel;
	protected $SuccessTransactionModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
		$this->SuccessTransactionModel = new SuccessTransactionModel();
	}

	public function index()
	{
		$tiket = $this->TiketOrderModel->getAllAndOrder();
		$successTransaction = [];
		$today = date("Y-m-d");
		$waiting = [];
		$fail = [];

		$pulang_pergi_tiket = [];
		$pulang_pergi_tiket2 = [];
		$just_pergi = [];
		$big_data = [];
		if ($tiket) {
			foreach ($tiket as $key) {
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


			foreach ($big_data as $key) {
				if ($key['confirmed'] == "0") {
					if (strtotime($today) < strtotime($key['tanggal_berangkat'])) {
						$waiting[] = $key;
					} else {
						$fail[] = $key;
					}
				}else {
					$successTransaction[] = $key;
				}
			}
		}

		$data = [
			"title" => "Ktrains | Staff Home",
			"active" => "home",
			"order" => $big_data,
			"success" => $successTransaction,
			"waiting" => $waiting,
			"fail" => $fail
		];
		return view('staff/index', $data);
	}

	//--------------------------------------------------------------------

}
