<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\serviceModel;

class Services extends BaseController
{
    public function index()
    {

		return $this->render_template('admin/services/add_new');

    }
     public function view_all()
    {
        $session = session();
        $Model = new serviceModel();
        $data['services'] = $Model->getServices();
		return $this->render_template('admin/services/view_all',$data);

    }
    
    
    
     public function edit($id = null)
    {
        $session = session();
        $Model = new serviceModel();
        $data['service'] = $Model->getServices($id);
		return $this->render_template('admin/services/edit',$data);

    }
    
    public function store(){
        $session = session();
        $Model = new serviceModel();
        
         $data=array(
                    'name' => $this->request->getVar('name'),
                    'price' => $this->request->getVar('price'),
                    'status' => 1,
                    );
        
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('service/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('service/add');
                    }
        
    }
    
    
    
    
    
    
     public function update(){
        $session = session();
        $Model = new serviceModel();
        $id = $this->request->getVar('id');
         $data=array(
                    'name' => $this->request->getVar('name'),
                    'price' => $this->request->getVar('price'),
                    'status' => $this->request->getVar('status'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('service/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('service/all');
                    }
        
    }
    
    
     public function delete($id = null){
        $session = session();
        $Model = new serviceModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   return redirect()->to('service/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        return redirect()->to('service/all');
                    }
        
    }
    
    
     
     
    
    
}
