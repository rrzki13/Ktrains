<?php

namespace App\Controllers\manager;

use App\Models\KeretaModel;
use App\Models\StasiunModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class AddStaff extends BaseController
{
	protected $KeretaModel;
	protected $StasiunModel;
	protected $UserModel;
	public function __construct()
	{
		$this->KeretaModel = new KeretaModel();
		$this->StasiunModel = new StasiunModel();
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Manager Add Staff",
			"active" => "add_staff",
            'validation' => \Config\Services::validation()
		];
		return view('manager/add_staff', $data);
	}

	public function addStaffProgress() {
		if (!$this->validate([
            'usernameStaff' => [
                'rules' => 'required|is_unique[user.username]|alpha_dash',
                'errors' => [
                    'alpha_dash' => 'username tidak boleh menggunakan spasi atau karakter unik',
                    'required' => 'username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'emailStaff' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah terdaftar',
                    'valid_email' => 'Email tidak valid'
                ]
			],
			'staffProfile' => [
				'rules' => 'max_size[staffProfile,3072]|is_image[staffProfile]|mime_in[staffProfile,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'yang anda upload bukan gambar',
					'mime_in' => 'yang anda upload bukan gambar'
				]
			]
        ])) {
            return redirect()->to(base_URL('/manager/AddStaff'))->withInput();
        }else {
			// * ambil gambar
			$fileImg = $this->request->getFile('staffProfile');
			// * apakah tidak ada gambar yang diupload
			if($fileImg->getError() == 4){
				$namaImg = 'staff.jpg';
			}else{
				// * generate nama
				$namaImg = $fileImg->getRandomName();
				// * pindahkan
				$fileImg->move('profile', $namaImg);
			}

			// * save staff
			$nama = $this->request->getVar('firstNameStaff');
            $nama .= " ";
            $nama .= $this->request->getVar('lastNameStaff');
            $data = [
                "username" => strtolower($this->request->getVar('usernameStaff')),
                "password" => md5($this->request->getVar('staffPass')),
                "nama_lengkap" => $nama,
                "email" => $this->request->getVar('emailStaff'),
                "gambar" => $namaImg,
                "level" => "staff"
			];
			
			$this->UserModel->insert($data);

            session()->setFlashData("successAddStaff", "Staff Berhasil dibuat");

            return redirect()->to(base_url('/manager/StaffList'));
		}
	}

	//--------------------------------------------------------------------

}
