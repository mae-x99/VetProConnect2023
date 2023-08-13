<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Models\userModel;
use App\Models\petModel;
use App\Models\serviceModel;
use App\Models\medicineModel;
use App\Models\appointmentModel;
  
class patReportModel extends Model{
    protected $table = 'patient_reports';
    
    protected $allowedFields = [
        'doctor_id',
        'appointment_id',
        'patient_id',
        'pet_id',
        'services',
        'symptoms',
        'medication',
        'status',
    ];
    
    
    
     public function getReports($id = false) {
      if($id === false) {
        return $this->findAll();
      } 
      else {
          return $this->where('appointment_id', $id)->find();
      }
      
     }
    
    
    public function getPatientReportByDoctor($doc_id){
        
         	$sql = "SELECT patient_reports.id, patient_reports.symptoms, patient_reports.appointment_id, patient_reports.status,pets.name , user.first_name, user.last_name  FROM patient_reports 
        	LEFT JOIN pets ON pets.id = patient_reports.pet_id
        	LEFT JOIN user ON user.id = patient_reports.patient_id WHERE patient_reports.doctor_id = '$doc_id'";
        
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
        
    }
    
    
    
    
    public function get_patient_report_by_id($id){
        
        $session = session();
        $reportModel = new patReportModel();
        $userModel = new userModel();
        $appointmentModel = new appointmentModel();
        $serviceModel = new serviceModel();
        $medicineModel = new medicineModel();
        $petModel = new petModel();
        
        $report = $reportModel->where('appointment_id', $id)->find();
        $report = $report[0];
        
        $doctor_id = $report['doctor_id'];
        $patient_id = $report['patient_id'];
        $pet_id = $report['pet_id'];
        $service_ids = json_decode($report['services']);
        $symptoms = $report['symptoms'];
        $medication_ids = json_decode($report['medication']);
        $app_id = $report['appointment_id'];
        
        $doctor = $userModel->where('id', $doctor_id)->find()[0];
        $doctor_name = $doctor['first_name'].' '.$doctor['last_name'];
        
        $patient = $userModel->where('id', $patient_id)->find()[0];
        $patient_name = $patient['first_name'].' '.$patient['last_name'];
        
        $pet = $petModel->where('id', $pet_id)->find()[0];
        $pet_name = $pet['name'];
        
        $appointment = $appointmentModel->where('id', $app_id)->find()[0];
        $date = $appointment['date'];
        
        $services =array();
        
        foreach($service_ids as $id){
        $service = $serviceModel->where('id', $id)->find()[0];
        $services[] = $service['name'];
        }
        
        $medicines =array();
        
        foreach($medication_ids as $id){
        $medicine = $medicineModel->where('id', $id)->find()[0];
        $medicines[] = $medicine['name'];
        }
        
        $data = array();
        
        $data['date'] = $date;
        $data['doctor_name'] = $doctor_name;
        $data['patient_name'] = $patient_name;
        $data['pet_name'] = $pet_name;
        $data['medicines'] = $medicines;
        $data['services'] = $services;
        $data['symptoms'] = $symptoms;
        
        return $data;
    }
    
    
    
    
    
    
    
    
    
    
    
     
     
}