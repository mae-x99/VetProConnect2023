<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class petModel extends Model{
    protected $table = 'pets';
    
    protected $allowedFields = [
        'owner_id',
        'name',
        'breed',
        'age',
        'weight',
        'gender'
    ];
    
    
    
     public function getPets($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
     
     
     public function getPetsByOwner($id = false) {
      
          return $this->where('owner_id', $id)->findAll();
      
     }
     
     
    
    
     
     
}