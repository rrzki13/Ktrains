<?php

namespace App\Controllers\manager;

use App\Models\TiketOrderModel;
use App\Models\KeretaModel;
use App\Controllers\BaseController;

class BestTrain extends BaseController
{
	protected $TiketOrderModel;
	protected $KeretaModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
		$this->KeretaModel = new KeretaModel();
	}

	public function index()
	{
		$tiket = $this->TiketOrderModel->getConfirmed();
		$bestTrain = [];
		foreach ($tiket as $key) {
			$jmlOrder = 0;
			$arrayIdTrain = [];
			if (!in_array($key['id_kereta'], $arrayIdTrain)) {
				$jmlOrder++;
			}else {
				$arrayIdTrain[] = $key['id_kereta'];
			}
			$getTrain = $this->KeretaModel->getTrainById($key['id_kereta']);
			$bestTrain[] = [
				"train_name" => $getTrain['train_name'],
				"train_class" => $getTrain['train_class'],
				"train_order" => $jmlOrder
			];
		}
		$data = [
			"title" => "Ktrains | Manager Best Train List",
			"active" => "train_best",
			"best_train" => $bestTrain
		];
		return view('manager/best_train', $data);
	}

	//--------------------------------------------------------------------

}
