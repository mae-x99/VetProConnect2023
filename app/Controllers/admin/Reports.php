<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\patReportModel;
use App\Models\appointmentModel;


class Reports extends BaseController
{
    
    
    
    public function all_patient_reports(){
        
        
         $session = session();
        $Model = new patReportModel();
        $doctor_id = $_SESSION['id'];
        $data['reports'] = $Model->getPatientReportByDoctor($doctor_id);
		return $this->render_template('doctor/report/patient_reports',$data);


    }
    
    
    
    
    
    
    
    public function add_patient_report()
    {
        
         $session = session();
        $Model = new patReportModel();
        $appointmentModel = new appointmentModel();
        $doctor_id = $_SESSION['id'];
        
        $user_type =$_SESSION['user_type'];
       $appointment_id = $this->request->getVar('appointment_id');
         $data=array(
                    'doctor_id' => $doctor_id,
                    'appointment_id' => $appointment_id,
                    'patient_id' => $this->request->getVar('patient_id'),
                    'pet_id' => $this->request->getVar('pet_id'),
                    'services' => json_encode($this->request->getVar('service')),
                    'symptoms' => json_encode($this->request->getVar('symp')),
                    'medication' => json_encode($this->request->getVar('medicine')),
                    'status' => $this->request->getVar('status'),
                    );
                    
       $status = $this->request->getVar('status');
        $inserted = $Model->save($data);
        if($status == 'Pending')
        {
        	$status2 = 'Processing';
        }else
        {
        	$status2 = $status;
        }
        $data1 = array(
            'status' => $status2
            );
        $update = $appointmentModel->update($appointment_id,$data1);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   if($status == 'Complete'){
                        return redirect()->to('patient/reports/all');
                   }else{
                        return redirect()->to('doctor/today_appointment');
                   }
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                         if($status == 'Complete'){
                        return redirect()->to('patient/reports/all');
                   }else{
                        return redirect()->to('doctor/today_appointment');
                   }
                    
                    }
        
        

    }
    
      public function update_patient_report()
    {
        
         $session = session();
        $Model = new patReportModel();
        $appointmentModel = new appointmentModel();
        $doctor_id = $_SESSION['id'];
        $report_id = $this->request->getVar('report_id');
        
        $user_type =$_SESSION['user_type'];
       $appointment_id = $this->request->getVar('appointment_id');
         $data=array(
                    'doctor_id' => $doctor_id,
                    'appointment_id' => $appointment_id,
                    'patient_id' => $this->request->getVar('patient_id'),
                    'pet_id' => $this->request->getVar('pet_id'),
                    'services' => json_encode($this->request->getVar('service')),
                    'symptoms' => json_encode($this->request->getVar('symp')),
                    'medication' => json_encode($this->request->getVar('medicine')),
                    'status' => $this->request->getVar('status'),
                    );
                    
       $status = $this->request->getVar('status');
        $inserted = $Model->update($report_id,$data);
        
        $data1 = array(
            'status' => $this->request->getVar('status')
            );
        $update = $appointmentModel->update($appointment_id,$data1);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   if($status == 'Complete'){
                        return redirect()->to('patient/reports/all');
                   }else{
                        return redirect()->to('doctor/today_appointment');
                   }
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                         if($status == 'Complete'){
                        return redirect()->to('patient/reports/all');
                   }else{
                        return redirect()->to('doctor/today_appointment');
                   }
                    
                    }
        
        

    }
 
    
    
    public function patient_report_print($id){
         $session = session();
        $Model = new patReportModel();
        $data['report'] = $Model->get_patient_report_by_id($id);
		return view('doctor/report/print_patient_reports',$data);
    }
    
    
}