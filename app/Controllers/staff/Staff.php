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
		$successTransaction = $this->SuccessTransactionModel->getAllAndOrder();
		$today = date("Y-m-d");
		$waiting = [];
		$fail = [];
		if (count($tiket) != 0) {
			foreach($tiket as $key) {
				if ($key['confirmed'] == "0") {
					if (strtotime($today) < strtotime($key['tanggal_berangkat'])) {
						$waiting[] = $key;
					}else {
						$fail[] = $key;
					}
				}
			}
		}

		$data = [
			"title" => "Ktrains | Staff Home",
			"active" => "home",
			"order" => $tiket,
			"success" => $successTransaction,
			"waiting" => $waiting,
			"fail" => $fail
		];
		return view('staff/index', $data);
	}

	//--------------------------------------------------------------------

}
