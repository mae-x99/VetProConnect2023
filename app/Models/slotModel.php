<?php 
namespace App\Models;  
use App\Models\appointmentModel;
use CodeIgniter\Model;
  
class slotModel extends Model{
    protected $table = 'timeslot';
    
    protected $allowedFields = [
        'slot',
        'dr_id',
        'doctor_slots_id',
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