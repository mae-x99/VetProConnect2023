<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\serviceModel;
use App\Models\medicineModel;
use App\Models\invoiceModel;

class Invoice extends BaseController
{



   public function index(){
        
        $session = session();
        $medicineModel = new medicineModel();
        $serviceModel = new serviceModel();
        $userModel = new userModel();
        
        $data['medicines'] = $medicineModel->getMedicine();
        $data['services'] = $serviceModel->getServices();
        $data['patient'] = $userModel->getUsersByType('patient');
        
		return $this->render_template('admin/invoice/add_new',$data);
    }
    
      public function view_all(){
        
        $session = session();
        $Model = new invoiceModel();
        
        $data['invoices'] = $Model->getInvoices();
        
		return $this->render_template('admin/invoice/all_bill',$data);
    }
   
    
      public function  patient_all(){
        
        $session = session();
        $Model = new invoiceModel();
       
        $data['invoices'] = $Model->getInvoicesByPateint($_SESSION['id']);
        
		return $this->render_template('patient/invoice/all_bill',$data);
    }
    
    
    public function get_service_price(){
         $session = session();
        $serviceModel = new serviceModel();
        
        $ser_id = $this->request->getVar('id');
         
        return json_encode($serviceModel->getServices($ser_id));
    }
    
     public function get_medicine_price(){
         $session = session();
        $medicineModel = new medicineModel();
        
        $ser_id = $this->request->getVar('id');
         
        return json_encode($medicineModel->getMedicine($ser_id));
    }
    
    
      public function store(){
        $session = session();
        $model = new invoiceModel();
        
        
         $data=array(
                    'date' => $this->request->getVar('date'),
                    'invo_note' => $this->request->getVar('note'),
                    'patient_id' => $this->request->getVar('patient'),
                    'ser_name' => json_encode($this->request->getVar('serviceName')),
                    'ser_qty' => json_encode($this->request->getVar('serviceQty')),
                    'ser_price' => json_encode($this->request->getVar('servicePrice')),
                    'ser_desc' => json_encode($this->request->getVar('serviceDesc')),
                    'med_name' => json_encode($this->request->getVar('medicineName')),
                    'med_qty' => json_encode($this->request->getVar('medicineQty')),
                    'med_price' => json_encode($this->request->getVar('medicinePrice')),
                    'med_desc' => json_encode($this->request->getVar('medicineDesc')),
                    'total' => $this->request->getVar('total'),
                    );
                    
         
         $inserted = $model->store($data);
         
        if($inserted == 'success'){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('invoice/all');
                  
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                         return redirect()->to('invoice/all');
                    
                    }
    }
    
    
    
    public function delete($id = null){
        $session = session();
        $Model = new invoiceModel();
        
        $deleted = $Model->delete_invoice($id);
        
        if($deleted == 'success'){
                   $session->setFlashdata('success', 'Successfully Deleted');
                         return redirect()->to('invoice/all');
                   
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                         return redirect()->to('invoice/all');
                        
                    }
        
    }
    
    
    
    public function billing_report_print($id){
         $session = session();
        $Model = new invoiceModel();
        
        $data['print'] = $Model->print_invoice($id);
        return view('admin/invoice/print',$data);
    }
    
    
}