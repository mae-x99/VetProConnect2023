<?php

namespace App\Controllers\doctor;
use App\Controllers\BaseController;
use App\Models\slotModel;
use App\Models\slotMainModel;

class slotController extends BaseController
{
    public function index()
    {
        $session = session();
        $Model = new slotModel();
         $user_id = $_SESSION['id'];
        $data['slots'] = $Model->where('dr_id',$user_id)->findAll();
		return $this->render_template('doctor/timeslot/add_new',$data);

    }
     public function view_all()
    {
        
		return $this->render_template('doctor/timeslot/view_all');

    }
    
    
     public function store(){
        $session = session();
        $user_id = $_SESSION['id'];
        $slots 	 = $this->request->getVar('time_slots_added');
       
        $Model2 = new slotMainModel();
        $data=array(
                    'start_time' 		=> $this->request->getVar('start_time'),
                    'end_time' 			=> $this->request->getVar('start_time'),
                    'number_of_slots' 	=> $this->request->getVar('number_of_slots'),
                    'duration' 			=> $this->request->getVar('duration'),
                    'doctor_id' 		=> $user_id,
                    );
        $inserted = $Model2->save($data);           
        
        
        $Model = new slotModel();
        for($i=0;$i<count($slots);$i++)
        {
        	$check_slot = $Model->where('dr_id',$user_id)->where('slot',$slots[$i])->first();
        	if(empty($check_slot))
        	{
        		$data=array(
                    'slot' 				=> $slots[$i],
                    'dr_id' 			=> $user_id,
                    'doctor_slots_id' 	=> $inserted,
                    );
            	$inserted = $Model->save($data); 
        	}
        	       
        }
         
                    
        $id = $this->request->getVar('id');
        
        //$inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('slot/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('slot/add');
                    }
        
    }
    
    
    public function update()
    {
    	$id 		= $this->request->getVar('edit_slot_id');
    	$slot 		= $this->request->getVar('edit_slot');
    	$Model 		= new slotModel();
    	$session = session();
        $user_id = $_SESSION['id'];
    	$check_slot = $Model->where('dr_id',$user_id)->where('slot',$slot)->where('id !=',$id)->first();
    	if(!empty($check_slot))
    	{
    		$json = array(
        				 	'success' => false,
        				 	'message' => 'Slot is already Exists'
        				 );
        	echo json_encode($json);	
        	die();		 
    	}
    	$data=array(
                    'slot' 				=> $slot
                    );
        $updated = $Model->update($id,$data); 
        if($updated)
        {
        	$json = array(
        				 	'success' => true,
        				 	'message' => 'Slot Successfully Updated'
        				 );
        }else
        {
        	$json = array(
        				 	'success' => false,
        				 	'message' => 'Some thing went wrong'
        				 );
        } 
        echo json_encode($json);
    }
    
    
         
    public function delete($id = null){
        $session = session();
        $Model = new slotModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('del_success', 'Successfully Deleted');
                   return redirect()->to('slot/add');
                    }
                    else{
                         $session->setFlashdata('del_Error', 'Not Deleted');
                        return redirect()->to('slot/add');
                    }
        
    }
    
    
   
    
    
}