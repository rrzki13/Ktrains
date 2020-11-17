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

		$pulang_pergi_tiket = [];
		$pulang_pergi_tiket2 = [];
		$just_pergi = [];
		$big_data = [];
		if ($tiketOrder) {
			foreach ($tiketOrder as $key) {
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

			$arrayIdTrain = [];
			$test = [];
			$jmlOrder = 1;
			foreach ($tiket as $key) {
				$test[] = $key['id_kereta'];
			}
			$test2 = array_count_values($test);
			$test3 = [];
			foreach ($test2 as $key) {
				$test3[] = $key;
			}
			$i = 0;
			foreach ($tiket as $key) {
				if (in_array($key['id_kereta'], $arrayIdTrain)) {
					$jmlOrder += 1;
				} else {
					$arrayIdTrain[] = $key['id_kereta'];
					$getTrain = $this->KeretaModel->getTrainById($key['id_kereta']);
					$bestTrain[] = [
						"train_name" => $getTrain['train_name'],
						"train_class" => $getTrain['train_class'],
						"train_order" => $test3[$i]
					];
					$i++;
				}
			}
		}

		$data = [
			"title" => "Ktrains | Manager Home",
			"active" => "home",
			"order" => $big_data,
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
