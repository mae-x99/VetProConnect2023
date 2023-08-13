<?php

namespace App\Controllers;
use App\Models\userModel;
use App\Models\petModel;
use App\Models\appointmentModel;
use App\Models\serviceModel;
use App\Models\medicineModel;
use App\Models\boardModel;
use App\Models\slotModel;

class Home extends BaseController
{
    
    
    public function index()
    { 
        helper(['form']);
        $data = [];
		return view('auth/login.php');
    }
    
    
    public function dashboard()
    {
        $session = session();
        $userModel = new userModel();
        $appointmentModel = new appointmentModel();
        $serviceModel = new serviceModel();
        $medicineModel = new medicineModel();
        $boardModel = new boardModel();
        $petModel = new petModel();
        $slotModel = new slotModel();
        
        
        
        $user_type =  $_SESSION['user_type'];
         if($user_type == 'admin'){
        
             $data['doctors'] = count($userModel->getUsersByType('doctor'));
             $data['patient'] = count($userModel->getUsersByType('patient'));
             $data['appointment'] = count($appointmentModel->getAppointments());
             $data['medicine'] = count($medicineModel->getMedicine());
             $data['service'] = count($serviceModel->getServices());
             $data['board'] = count($boardModel->getBoards());
        
             
       	return $this->render_template('admin_dashboard',$data);
       	
       }
       if($user_type == 'doctor'){
           $data['appointment'] = count($appointmentModel->getAppointmentsByDoctor($_SESSION['id']));
           $data['today_appointment'] = $appointmentModel->getAppointmentsByDoctor($_SESSION['id']);
           $data['slots']			 = $slotModel->where('dr_id',$_SESSION['id'])->first();
        
       	return $this->render_template('doctor_dashboard',$data);
       	
       }
       if($user_type == 'patient'){
              $data['pets'] = count($petModel->getPetsByOwner($_SESSION['id']));
       	return $this->render_template('patient_dashboard',$data);
       	
       }
	
    }
    
    
    
    
}
