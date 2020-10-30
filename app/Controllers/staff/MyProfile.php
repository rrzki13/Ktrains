<?php

namespace App\Controllers\staff;

use App\Models\UserModel;
use App\Controllers\BaseController;

class MyProfile extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            "title" => "Ktrains | Staff My Profile",
            "active" => "profile",
            'validation' => \Config\Services::validation()
        ];
        return view('staff/profile', $data);
    }

    public function changeProfile()
    {
        if (!$this->validate([
            'usernameProfile' => [
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'alpha_dash' => 'username tidak boleh menggunakan spasi atau karakter unik',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'emailProfile' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
            'imgProfile' => [
                'rules' => 'max_size[imgProfile,3072]|is_image[imgProfile]|mime_in[imgProfile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda upload bukan gambar',
                    'mime_in' => 'yang anda upload bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_URL('/staff/MyProfile'))->withInput();
        } else {
            // * ambil gambar
            $fileImg = $this->request->getFile('imgProfile');
            // * apakah tidak ada gambar yang diupload
            if ($fileImg->getError() == 4) {
                $namaImg = $this->request->getVar("old_pic");
            } else {
                if ($this->request->getVar("old_pic") != "staff.jpg") {
                    // * hapus gambar lama
                    unlink('profile/' . $this->request->getVar("old_pic"));
                }
                
                // * generate nama
                $namaImg = $fileImg->getRandomName();
                // * pindahkan
                $fileImg->move('profile', $namaImg);
            }

            // * save 
            $data = [
                "id" => $this->request->getVar('id'),
                "username" => strtolower($this->request->getVar('usernameProfile')),
                "nama_lengkap" => $this->request->getVar('nameProfile'),
                "email" => $this->request->getVar('emailProfile'),
                "gambar" => $namaImg
            ];

            $this->UserModel->save($data);

            session()->setFlashData("successChangeProfile", "Staff Berhasil dibuat");

            // * ganti session
            $data = [
                "id",
                "username",
                "password",
                "nama_lengkap",
                "email",
                "level",
                "created_at",
                "updated_at"
            ];
            session()->remove($data);

            $dataUser = $this->UserModel->getUser($this->request->getVar('id'));
            session()->set($dataUser);

            return redirect()->to("/staff/MyProfile");
        }
    }

    //--------------------------------------------------------------------

}
