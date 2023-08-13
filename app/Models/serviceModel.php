<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class serviceModel extends Model{
    protected $table = 'services';
    
    protected $allowedFields = [
        'name',
        'price',
        'status',
    ];
    
    
    
     public function getServices($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
    
    
     
     
}