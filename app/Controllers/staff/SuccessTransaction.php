<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Models\SuccessTransactionModel;
use App\Controllers\BaseController;

class SuccessTransaction extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$successTransaction = $this->TiketOrderModel->getConfirmed();
		// dd($successTransaction);
		$pulang_pergi_tiket = [];
		$pulang_pergi_tiket2 = [];
		$just_pergi = [];
		$big_data = [];
		if ($successTransaction) {
			foreach ($successTransaction as $key) {
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
			"title" => "Ktrains | Staff Succes Transaction",
			"active" => "success",
			"success" => $big_data
		];
		return view('staff/success', $data);
	}

	//--------------------------------------------------------------------

}
