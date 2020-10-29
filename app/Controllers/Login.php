<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        // * check cookies
        helper('cookie');
        if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];

            $test = $this->UserModel->getUser($id);

            if (md5($test['username']) == $key) {
                session()->set($test);
                if ($test['level'] == "manager") {
                    return redirect()->to(base_URL('/manager'));
                }else if ($test['level'] == "staff") {
                    return redirect()->to(base_URL('/staff'));
                }else {
                    return redirect()->to(base_URL('/'));
                }
            }
        }


        if (session()->get("username")) {
            return redirect()->to(base_url());
        }
        $data = [
            "title" => "Ktrains | Login",
            "active" => "login",
            'validation' => \Config\Services::validation()
        ];
        return view('login/index', $data);
    }

    public function Regist()
    {
        if (session()->get("username")) {
            return redirect()->to(base_url());
        }
        $data = [
            "title" => "Ktrains | Register",
            "active" => "regist",
            'validation' => \Config\Services::validation()
        ];
        return view('login/regist', $data);
    }

    public function registProses()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]|alpha_dash',
                'errors' => [
                    'alpha_dash' => 'username tidak boleh menggunakan spasi atau karakter unik',
                    'required' => 'username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah terdaftar',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
        ])) {
            return redirect()->to(base_URL('/regist'))->withInput();
        } else {
            $nama = $this->request->getVar('namaDepan');
            $nama .= " ";
            $nama .= $this->request->getVar('namaBelakang');
            $data = [
                "username" => strtolower($this->request->getVar('username')),
                "password" => md5($this->request->getVar('password')),
                "nama_lengkap" => $nama,
                "email" => $this->request->getVar('email'),
                "gambar" => "default.png",
                "level" => "user"
            ];

            $this->UserModel->insert($data);

            session()->setFlashData("success", "User Berhasil dibuat");

            return redirect()->to(base_url('/login'));
        }
    }

    public function loginProses()
    {
        $username = strtolower($this->request->getVar("username"));
        $password = md5($this->request->getVar("password"));

        $login = $this->UserModel->auth($username, $password);
        if ($login == false) {
            session()->setFlashData("wrong", "Username or Password");
            return redirect()->to(base_url('/login'));
        }
        helper('cookie');
        $key = md5($login['username']);
        setcookie("id", $login['id'], time() + (3600 * 24) * 365);
        setcookie("key", $key, time() + (3600 * 24) * 365);

        session()->set($login);

        if ($login['level'] == "manager") {
            return redirect()->to(base_url("/manager"));
        }else if ($login['level'] == "staff") {
            return redirect()->to(base_url("/staff"));
        }else{
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        if (!session()->get("username")) {
            return redirect()->to(base_url('/login'));
        }

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

        helper('cookie');
		setcookie("id", "", time()-1);
		setcookie("key", "", time()-1);

        return redirect()->to(base_URL('/login'));
    }

    //--------------------------------------------------------------------

}
