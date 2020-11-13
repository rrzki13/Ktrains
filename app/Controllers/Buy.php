<?php

namespace App\Controllers;

class Buy extends BaseController
{
	public function index()
	{
		if(!$_POST) {
			return redirect()->to(base_url());
		}
		$dataTest = $this->request->getVar();
		// dd($dataTest);
		if ($dataTest) {
			$data = [
				"title" => "Ktrains | Buy Ticket",
				"active" => "buy",
				"data_pesan_tiket" => $dataTest
			];
			return view('buy/index', $data);
		}else {
			return redirect()->to(base_url());
		}		
	}

	//--------------------------------------------------------------------

}
