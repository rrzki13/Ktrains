<?php 
namespace App\Models;

use CodeIgniter\Model;

class TiketOrderModel extends Model
{
	protected $table = 'tiket_order';
	protected $useTimestamps = true;
	
	public function getAll() {
        return $this->findAll();
    }

<<<<<<< HEAD
    public function getByUserId($id) {
        return $this->where(['id_pemesan' => $id])->findAll();
=======
    public function getMyOrder($id) {
        return $this->where(['id_pemesan' => $id,'confirmed' => "1",'deleted' => "0"])->findAll();
>>>>>>> history
    }
    
}