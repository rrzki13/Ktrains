<?php 
namespace App\Models;

use CodeIgniter\Model;

class TiketOrderModel extends Model
{
	protected $table = 'tiket_order';
    protected $useTimestamps = true;
    protected $allowedFields =['confirmed'];
	
	public function getAll() {
        return $this->findAll();
    }

    public function getById($id) {
        return $this->where(['id' => $id])->first();
    }

    public function getAllAndOrder() {
        return $this->orderBy("id", "DESC")->findAll();
    }

    public function getConfirmed() {
        return $this->where(['confirmed' => "1"])->findAll();
    }

    public function getByUserId($id) {
        return $this->where(['id_pemesan' => $id])->orderBy("id", "DESC")->findAll();
    }
    
    public function getMyOrder($id) {
        return $this->where(['id_pemesan' => $id,'confirmed' => "1",'deleted' => "0"])->findAll();
    }

    public function getRestoreTiket($id) {
        return $this->where(['id_pemesan' => $id, 'deleted' => "1"])->orderBy("deleted_in", "DESC")->findAll();
    } 

    public function getByNoPesanan($no) {
        return $this->where(['no_pesanan' => $no])->first();
    }
    
}