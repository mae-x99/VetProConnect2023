<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\medicineModel;

class Medication extends BaseController
{
    public function index()
    {

		return $this->render_template('admin/medication/add_new');

    }
     public function view_all()
    {
        $session = session();
        $Model = new medicineModel();
        $data['medicines'] = $Model->getMedicine();
		return $this->render_template('admin/medication/view_all',$data);

    }
    
     public function view_all_medicine()
    {
        $session = session();
        $Model = new medicineModel();
        $data['medicines'] = $Model->getMedicine();
		return $this->render_template('doctor/medication_report',$data);

    }
    
     public function edit($id = null)
    {
        $session = session();
        $Model = new medicineModel();
        $data['medicine'] = $Model->getMedicine($id);
		return $this->render_template('admin/medication/edit',$data);

    }
    
    
    public function store(){
        $session = session();
        $Model = new medicineModel();
        
         $data=array(
                    'name' => $this->request->getVar('name'),
                    'quantity' => $this->request->getVar('quantity'),
                    'price' => $this->request->getVar('price'),
                    );
        
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('medicne/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('medicne/add');
                    }
        
    }
    
    
    
    
    
     public function update(){
        $session = session();
        $Model = new medicineModel();
        $id = $this->request->getVar('id');
         $data=array(
                    'name' => $this->request->getVar('name'),
                    'price' => $this->request->getVar('price'),
                    'quantity' => $this->request->getVar('quantity'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('medicne/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('medicne/all');
                    }
        
    }
    
    
    
    
     public function delete($id = null){
        $session = session();
        $Model = new medicineModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   return redirect()->to('medicne/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        return redirect()->to('medicne/all');
                    }
        
    }
    
    
    
    
}
