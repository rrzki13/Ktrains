<?php 
namespace App\Models;

use CodeIgniter\Model;

class StasiunModel extends Model
{
	protected $table = 'station';
	protected $useTimestamps = true;
	
	public function getAll() {
        return $this->findAll();
	}
	
	public function getStationByCode($code) {
		return $this->where(['code' => $code])->first();
	}
    
}