<?php 
namespace App\Models;

use CodeIgniter\Model;

class SuccessTransactionModel extends Model
{
	protected $table = 'success_transaction';
	protected $useTimestamps = true;
	
	public function getAll() {
        return $this->findAll();
    }

    public function getAllAndOrder() {
        return $this->orderBy("id", "DESC")->findAll();
    }
    
}