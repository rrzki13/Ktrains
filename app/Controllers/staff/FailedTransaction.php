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
		if (count($tiket) != 0) {
			foreach($tiket as $key) {
				if ($key['confirmed'] == "0") {
					if (strtotime($today) > strtotime($key['tanggal_berangkat'])) {
						$fail[] = $key;
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
