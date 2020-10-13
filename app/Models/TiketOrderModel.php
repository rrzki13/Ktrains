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

    public function getByUserId($id) {
        return $this->where(['id_pemesan' => $id])->findAll();
    }
    
}