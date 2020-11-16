<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Models\SuccessTransactionModel;
use App\Controllers\BaseController;

class WaitingTransaction extends BaseController
{
	protected $TiketOrderModel;
	protected $SuccessTransactionModel;
	public function __construct()
	{
		$this->SuccessTransactionModel = new SuccessTransactionModel();
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$tiket = $this->TiketOrderModel->getAllAndOrder();
		$today = date("Y-m-d");
		$waiting = [];
		if (count($tiket) != 0) {
			foreach ($tiket as $key) {
				if ($key['confirmed'] == "0") {
					if (strtotime($today) < strtotime($key['tanggal_berangkat'])) {
						$waiting[] = $key;
					}
				}
			}
		}
		
		$pulang_pergi_tiket = [];
		$pulang_pergi_tiket2 = [];
		$just_pergi = [];
		$big_data = [];
		if ($waiting) {
			foreach ($waiting as $key) {
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
			"title" => "Ktrains | Staff Waiting Transaction",
			"active" => "waiting",
			"wait" => $big_data
		];
		return view('staff/waiting', $data);
	}

	public function confirm()
	{
		$order = $this->TiketOrderModel->getById($this->request->getVar("id"));
		$dataTiketOrder = [
			"id" => $this->request->getVar("id"),
			"confirmed" => "1"
		];

		if ($order['pulang_pergi'] == "1") {
			$order2 = $this->TiketOrderModel->getByNoPesanan($order['pulang_pergi_with']);
			$dataTiketOrderPulang = [
				"id" => $order2['id'],
				"confirmed" => "1"
			];
			$this->TiketOrderModel->save($dataTiketOrderPulang);
		}
		$this->TiketOrderModel->save($dataTiketOrder);

		session()->setFlashData("confirmSuccess", "confirm success");

		return redirect()->to(base_url('/staff/SuccessTransaction'));
	}

	//--------------------------------------------------------------------

}
