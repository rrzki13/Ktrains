<?php

namespace App\Controllers\manager;

use App\Models\KeretaModel;
use App\Models\StasiunModel;
use App\Controllers\BaseController;

class TrainList extends BaseController
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
			"title" => "Ktrains | Manager Train List",
			"active" => "train_list"
		];
		return view('manager/train_list', $data);
	}

	//--------------------------------------------------------------------

}
