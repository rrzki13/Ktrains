<?php

namespace App\Controllers\manager;

use App\Models\StasiunModel;
use App\Controllers\BaseController;

class StationList extends BaseController
{
	protected $StasiunModel;
	public function __construct()
	{
		$this->StasiunModel = new StasiunModel();
	}

	public function index()
	{
		$station = $this->StasiunModel->getAll();
		$data = [
			"title" => "Ktrains | Manager Station List",
			"active" => "station",
			"station" => $station
		];
		return view('manager/station', $data);
	}

	//--------------------------------------------------------------------

}
