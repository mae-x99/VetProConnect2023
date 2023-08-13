<?php 
namespace App\Models;  
use App\Models\appointmentModel;
use CodeIgniter\Model;
  
class slotMainModel extends Model{
    protected $table = 'tbl_doctor_slots';
    
    protected $allowedFields = [
        'start_time',
        'doctor_id',
        'end_time',
        'number_of_slots',
        'duration',
    ];
    
    
    
     public function getSlots($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
     
     public function getSlotByAppointment($id = false) {
            $session = session();
            $Model = new appointmentModel();
            
            $appointment = $Model->where('id',$id)->find();
            
          return $this->where('id', $appointment[0]['timeslot'])->find();
      
     }

    
    
     
     
}