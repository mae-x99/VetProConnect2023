<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class userModel extends Model{
    protected $table = 'user';
    
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_type',
        'city',
        'zipcode',
        'phone',
        'address',
        'token',
        'profile_pic'
    ];
    
    
    
    	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM user WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->getNumRows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
	
	
     public function getUsers($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
     
     public function getUsersByType($type = false) {
      
      if($type != 'false') {
          return $this->where('user_type', $type)->findAll();
      }
      
     }
     
     
    
    
    
}