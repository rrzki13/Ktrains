<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'user';
	protected $useTimestamps = true;
	protected $allowedFields =['username','password','nama_lengkap', 'email', 'gambar', 'level'];
	
	public function auth($username, $password) {
		$check = $this->where(['username' => $username])->first();
		$check2 = $this->where(['email' => $username])->first();
		if ($check) {
			if ($check['password'] == $password) {
				return $check;
			}else {
				return false;
			}
		}else {
			if ($check2) {
				if ($check2['password'] == $password) {
					return $check2;
				}else {
					return false;
				}
			}else{
				return false;
			}
		}
	}
    
}