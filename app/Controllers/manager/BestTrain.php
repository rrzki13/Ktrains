<?php

namespace App\Controllers\manager;

use App\Models\KeretaModel;
use App\Models\StasiunModel;
use App\Controllers\BaseController;

class BestTrain extends BaseController
{
	protected $KeretaModel;
	protected $StasiunModel;
	public function __construct()
	{
		$this->KeretaModel = new KeretaModel();
		$this->StasiunModel = new StasiunModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Manager Best Train List",
			"active" => "train_best"
		];
		return view('manager/best_train', $data);
	}

	//--------------------------------------------------------------------

}
