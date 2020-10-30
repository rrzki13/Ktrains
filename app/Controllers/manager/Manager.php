<?php

namespace App\Controllers\manager;

use App\Models\TiketOrderModel;
use App\Models\StasiunModel;
use App\Models\KeretaModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Manager extends BaseController
{
	protected $TiketOrderModel;
	protected $StasiunModel;
	protected $UserModel;
	protected $KeretaModel;
	public function __construct()
	{
		$this->KeretaModel = new KeretaModel();
		$this->UserModel = new UserModel();
		$this->StasiunModel = new StasiunModel();
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$tiketOrder = $this->TiketOrderModel->getAll();
		$stasiun = $this->StasiunModel->getAll();
		$kereta = $this->KeretaModel->getAll();
		$user = $this->UserModel->getAllUser();
		$staff = $this->UserModel->getStaff();
		$tiket = $this->TiketOrderModel->getConfirmed();

		$bestTrain = [];
		foreach ($tiket as $key) {
			$jmlOrder = 0;
			$arrayIdTrain = [];
			if (!in_array($key['id_kereta'], $arrayIdTrain)) {
				$jmlOrder++;
			} else {
				$arrayIdTrain[] = $key['id_kereta'];
			}
			$getTrain = $this->KeretaModel->getTrainById($key['id_kereta']);
			$bestTrain[] = [
				"train_name" => $key['nama_kereta'],
				"train_class" => $getTrain['train_class'],
				"train_order" => $jmlOrder
			];
		}
		
		$data = [
			"title" => "Ktrains | Manager Home",
			"active" => "home",
			"order" => $tiketOrder,
			"stasiun" => $stasiun,
			"kereta" => $kereta,
			"user" => $user,
			"staff" => $staff,
			"best_train" => $bestTrain
		];
		return view('manager/index', $data);
	}

	//--------------------------------------------------------------------

}
