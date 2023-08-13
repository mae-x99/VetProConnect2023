<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class medicineModel extends Model{
    protected $table = 'medication';
    
    protected $allowedFields = [
        'name',
        'quantity',
        'price',
    ];
    
    
    
     public function getMedicine($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
    
    
     
     
}