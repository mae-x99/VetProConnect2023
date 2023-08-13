<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class symptomModel extends Model{
    protected $table = 'symptom';
    
    protected $allowedFields = [
        'name',
    ];
    
    
    
     public function getSymptom($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
    
    
     
     
}