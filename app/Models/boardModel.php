<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class boardModel extends Model{
    protected $table = 'pet_board';
    
    protected $allowedFields = [
        'patient_id',
        'pet_id',
        'status',
        'check_in',
        'check_out'
    ];
    
    
    
     public function getBoards($id = false) {
         
      if($id === false) {
        	$sql = 'SELECT pet_board.id, pet_board.check_in, pet_board.check_out,pet_board.status, user.first_name, user.last_name, pets.name  FROM pet_board 
        	LEFT JOIN pets ON pets.id = pet_board.pet_id
        	LEFT JOIN user ON user.id = pet_board.patient_id';
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      } 
      else {
          
         return $this->where('id', $id)->find();
          
      }
      
     }
     
     
}