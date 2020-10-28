<?php

namespace App\Controllers\manager;

use App\Models\KeretaModel;
use App\Controllers\BaseController;

class TrainList extends BaseController
{
	protected $KeretaModel;
	public function __construct()
	{
		$this->KeretaModel = new KeretaModel();
	}

	public function index()
	{
		$kereta = $this->KeretaModel->getAll();
		$data = [
			"title" => "Ktrains | Manager Train List",
			"active" => "train_list",
			"kereta" => $kereta
		];
		return view('manager/train_list', $data);
	}

	//--------------------------------------------------------------------

}
