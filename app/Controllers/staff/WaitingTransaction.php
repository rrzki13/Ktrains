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

	public function confirm() {
		$order = $this->TiketOrderModel->getById($this->request->getVar("id"));
		$data = [
			"id_tiket_order" => $this->request->getVar("id"),
			"no_pesanan" => $order['no_pesanan'],
			"jml_tiket" => $order['jumlah_tiket'],
			"stasiun_awal" => $order['stasiun_awal'],
			"stasiun_akhir" => $order['stasiun_akhir'],
			"tgl_berangkat" => $order['tanggal_berangkat'],
			"tgl_pulang" => $order['tanggal_pulang'],
			"total" => $order['total'],
			"id_pemesan" => $order['id_pemesan'],
			"nama_pemesan" => $order['nama_pemesan'],
			"confirmed_by" => $this->request->getVar("confirm_by")
		];

		$dataTiketOrder = [
			"id" => $this->request->getVar("id"),
			"confirmed" => "1"
		];

		$this->TiketOrderModel->save($dataTiketOrder);
		$this->SuccessTransactionModel->insert($data);

		session()->setFlashData("confirmSuccess", "confirm success");

        return redirect()->to(base_url('/staff/SuccessTransaction'));
	}

	//--------------------------------------------------------------------

}
