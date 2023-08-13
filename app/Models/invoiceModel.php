<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Models\userModel;
use App\Models\petModel;
use App\Models\serviceModel;
use App\Models\medicineModel;
use App\Models\appointmentModel;
  
class invoiceModel extends Model{
    protected $table = 'invoice';
    
    protected $allowedFields = [
        'date',
        'patient_id',
        'ser_name',
        'ser_qty',
        'ser_price',
        'ser_desc',
        'med_name',
        'med_qty',
        'med_price',
        'med_desc',
        'total',
        'invo_note'
    ];
    
    
    
     public function getInvoices($id = false) {
      if($id === false) {
          
        	$sql = "SELECT invoice.id, invoice.date, invoice.total, user.first_name, user.last_name  FROM invoice 
        	LEFT JOIN user ON user.id = invoice.patient_id ORDER BY invoice.id DESC";
        
			$querys = $this->db->query($sql);
			 
			$result = $querys->getResultArray('array');

        
          return $result;
        
      } 
      else {
          return $this->where('id', $id)->find();
      }
      
     }
     
     
      public function getInvoicesByPateint($id) {
   
           return $this->where('patient_id', $id)->findAll();
        
    
      
     }
     
     
     
     public function store($data){
         $session = session();
         $medicineModel = new medicineModel();
         $invoiceModel = new invoiceModel();
        
         $med_ids = json_decode($data['med_name']);
         $med_qty = json_decode($data['med_qty']);
         if($med_ids){
         for($i = 0; $i < count($med_ids); $i++){
             
           $medicine =  $medicineModel->getMedicine($med_ids[$i])[0];
           $remaining = $medicine['quantity'] - $med_qty[$i];
           
           $update = $medicineModel->update($med_ids[$i], array('quantity' => $remaining));
           
         }
         }else{
             $update = 'update';
         }
         if($update){
             
              $inserted = $invoiceModel->save($data);
              if($inserted){
                  return 'success';
              }else{
                  return 'error';
              }
         }
         
        
         
     }
     
     
     
     
     
     public function delete_invoice($id){
         
         $session = session();
         $medicineModel = new medicineModel();
         $invoiceModel = new invoiceModel();
         
         $invoice = $invoiceModel->where('id', $id)->find()[0];
         
         $med_ids = json_decode($invoice['med_name']);
         $med_qty = json_decode($invoice['med_qty']);
         
          for($i = 0; $i < count($med_ids); $i++){
             
           $medicine =  $medicineModel->getMedicine($med_ids[$i])[0];
           $remaining = $medicine['quantity'] + $med_qty[$i];
           
           $update = $medicineModel->update($med_ids[$i], array('quantity' => $remaining));
           
         }
         
         if($update){
             
              $deleted = $invoiceModel->where('id', $id)->delete();;
              if($deleted){
                  
                  return 'success';
              }else{
                  return 'error';
              }
         }
         
     }
    
    
    
    public function print_invoice($id){
         $session = session();
         $medicineModel = new medicineModel();
         $invoiceModel = new invoiceModel();
         $userModel = new userModel();
         $serviceModel =  new serviceModel();
         
        
        $main_data = array();
        $invoice = $invoiceModel->getInvoices($id)[0];
        
        $main_data['id'] = $invoice['id'];
        $main_data['date'] = $invoice['date'];
        $main_data['total'] = $invoice['total'];
        $main_data['note'] = $invoice['invo_note'];
        $main_data['patient'] = $userModel->getUsers($invoice['patient_id']);
        
        
         $med_ids = json_decode($invoice['med_name']);
         $ser_ids = json_decode($invoice['ser_name']);
         
         $medicines = array();
         $services = array();
         
          for($i = 0; $i < count($med_ids); $i++){
           $medicine =  $medicineModel->getMedicine($med_ids[$i])[0];
           $medicines[] = $medicine['name'];
         }
         
          for($i = 0; $i < count($ser_ids); $i++){
           $service =  $serviceModel->getServices($ser_ids[$i])[0];
           $services[] = $service['name'];
         }
        
        $main_data['medicines'] = json_encode($medicines);
        $main_data['med_qty'] =  $invoice['med_qty'];
        $main_data['med_amount'] =  $invoice['med_price'];
        $main_data['med_desc'] =  $invoice['med_desc'];
        
        $main_data['services'] = json_encode($services);
        $main_data['ser_qty'] = $invoice['ser_qty'];
        $main_data['ser_amount'] = $invoice['ser_price'];
        $main_data['ser_desc'] = $invoice['ser_desc'];
        
        return $main_data;
    }
    
    
    
}