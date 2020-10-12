<?php 
namespace App\Models;

use CodeIgniter\Model;

class KeretaModel extends Model
{
	protected $table = 'train';
	protected $useTimestamps = true;
	
	public function getAll() {
        return $this->findAll();
    }
    
}