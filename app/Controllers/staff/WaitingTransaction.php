<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class WaitingTransaction extends BaseController
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
		$waiting = [];
		if (count($tiket) != 0) {
			foreach($tiket as $key) {
				if ($key['confirmed'] == "0") {
					if (strtotime($today) < strtotime($key['tanggal_berangkat'])) {
						$waiting[] = $key;
					}
				}
			}
		}
		$data = [
			"title" => "Ktrains | Staff Waiting Transaction",
			"active" => "waiting",
			"wait" => $waiting
		];
		return view('staff/waiting', $data);
	}

	//--------------------------------------------------------------------

}
