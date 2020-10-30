<?php 
namespace App\Models;

use CodeIgniter\Model;

class SuccessTransactionModel extends Model
{
	protected $table = 'success_transaction';
	protected $useTimestamps = true;
    protected $allowedFields =['id_tiket_order', 'no_pesanan', 'jml_tiket', 'stasiun_awal', 'stasiun_akhir', 'tgl_berangkat', 'tgl_pulang', 'total', 'id_pemesan', 'nama_pemesan', 'confirmed_by'];
	
	public function getAll() {
        return $this->findAll();
    }

    public function getAllAndOrder() {
        return $this->orderBy("id", "DESC")->findAll();
    }
    
}