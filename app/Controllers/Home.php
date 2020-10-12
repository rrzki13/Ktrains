<?php

namespace App\Controllers;

use App\Models\KeretaModel;
use App\Models\StasiunModel;

class Home extends BaseController
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
		$kereta = $this->KeretaModel->getAll();
		$stasiun = $this->StasiunModel->getAll();

		$data = [
			"title" => "Ktrains | Home",
			"active" => "home",
			"kereta" => $kereta,
			"stasiun" => $stasiun
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
