<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class FailedTransaction extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$tiket = $this->TiketOrderModel->getAllAndOrder();
		$today = date("Y-m-d");
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


			if (count($big_data) != 0) {
				foreach ($tiket as $key) {
					if ($key['confirmed'] == "0") {
						if (strtotime($today) >= strtotime($key['tanggal_berangkat'])) {
							$fail[] = $key;
						}
					}
				}
			}
		}
		$data = [
			"title" => "Ktrains | Staff Failed Transaction",
			"active" => "failed",
			"fail" => $fail
		];
		return view('staff/fail', $data);
	}

	//--------------------------------------------------------------------

}
