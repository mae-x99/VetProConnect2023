<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Models\slotModel;
  
class appointmentModel extends Model{
    protected $table = 'appointment';
    
    protected $allowedFields = [
        'patient_id',
        'doctor_id',
        'doctor_name',
        'pet_id',
        'date',
        'timeslot',
        'status',
    ];
    
   
    
    public function getSingleAppointment($id){
        
       	$sql = "SELECT appointment.id, appointment.date, appointment.status, appointment.patient_id, appointment.doctor_id, appointment.date as appointment_date, appointment.pet_id, timeslot.slot, user.first_name, user.last_name, pets.name,doc.first_name as clinic_name  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user as doc ON doc.id = appointment.doctor_id
        	LEFT JOIN user ON user.id = appointment.patient_id WHERE appointment.id ='$id'";
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
         
    }
    
    
     public function getAppointments($id = false) {
         
      if($id === false) {
        	$sql = 'SELECT appointment.id, appointment.date, appointment.doctor_name, appointment.status, timeslot.slot, user.first_name, user.last_name, pets.name  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user ON user.id = appointment.patient_id';
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      } 
      else {
          	$sql = "SELECT appointment.id, appointment.date, appointment.status, timeslot.slot, user.first_name, user.last_name, pets.name  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user ON user.id = appointment.doctor_id WHERE appointment.patient_id ='$id'";
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      }
      
      
     }
     
     public function getAppointmentspending($id = false) {
         
      if($id === false) {
        	$sql = 'SELECT appointment.id, appointment.date, appointment.doctor_name, appointment.status, timeslot.slot, user.first_name, user.last_name, pets.name,user.id AS user_id  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user ON user.id = appointment.patient_id where appointment.status = "Pending" ';
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      } 
      else {
          	$sql = "SELECT appointment.id, appointment.date, appointment.status, timeslot.slot, user.first_name, user.last_name, pets.name  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user ON user.id = appointment.doctor_id WHERE appointment.patient_id ='$id'";
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      }
      
      
     }
     
     
     
     
     
      public function getAppointmentsByDoctor($id = false) {
         
     
          	$sql = "SELECT appointment.id, appointment.date, appointment.status, timeslot.slot, user.first_name, user.last_name, pets.name  FROM appointment 
        	LEFT JOIN pets ON pets.id = appointment.pet_id
        	LEFT JOIN timeslot ON timeslot.id = appointment.timeslot
        	LEFT JOIN user ON user.id = appointment.patient_id WHERE appointment.doctor_id ='$id' ORDER BY appointment.timeslot";
        	
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
      
      
      
     }
     
     
     
     
     
     
     
     
     
     
     public function get_available_slots($date,$dr_id){
         
         $session = session();
        $Model = new slotModel();
        $slots = $Model->where('dr_id',$dr_id)->findAll();
        
        	$sql = "SELECT appointment.timeslot  FROM appointment WHERE date = '$date' AND doctor_id = '$dr_id' ";
        	
			$querys = $this->db->query($sql);
			 
			$appointments = $querys->getResultArray();
			$assign_slot = array();
			foreach($appointments as  $row){
			    $assign_slot[] =$row['timeslot']; 
			}
			$i=0;
			
            if(count($assign_slot) > 0){
                foreach($slots as $slot){
                    if(!in_array($slot['id'], $assign_slot)){
                        $i =1;
                        ?>
                        <option value="<?= $slot['id'] ?>"><?= $slot['slot'] ?></option>
                        <?php
                    }
                }
                if($i == 0){
                    ?>
                        <option value="">Sorry! No Slots Available In This Date Choose Another Date</option>
                        <?php
                }
            }
            else{
                foreach($slots as $slot){
                        ?>
                        <option value="<?= $slot['id'] ?>"><?= $slot['slot'] ?></option>
                        <?php
                }
                
            }
        
     }
     
     
}