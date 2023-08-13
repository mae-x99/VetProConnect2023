<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\symptomModel;

class Symptom extends BaseController
{
    public function index()
    {

		return $this->render_template('admin/symptom/add_new');

    }
     public function view_all()
    {
        $session = session();
        $Model = new symptomModel();
        $data['symptom'] = $Model->getSymptom();
		return $this->render_template('admin/symptom/view_all',$data);

    }
    
     public function view_all_symptom()
    {
        $session = session();
        $Model = new symptomModel();
        $data['symptom'] = $Model->getSymptom();
		return $this->render_template('doctor/symptom_report',$data);

    }
    
     public function edit($id = null)
    {
        $session = session();
        $Model = new symptomModel();
        $data['symptom'] = $Model->getSymptom($id);
        
		return $this->render_template('admin/symptom/edit',$data);

    }
    
    
    public function store(){
        $session = session();
        $Model = new symptomModel();
        
         $data=array(
                    'name' => $this->request->getVar('name'),
                    );
        
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('symptom/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('symptom/add');
                    }
        
    }
    
    
    
    
    
     public function update(){
        $session = session();
        $Model = new symptomModel();
        $id = $this->request->getVar('id');
         $data=array(
                    'name' => $this->request->getVar('name'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('symptom/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('symptom/all');
                    }
        
    }
    
    
    
    
     public function delete($id = null){
        $session = session();
        $Model = new symptomModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   return redirect()->to('symptom/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        return redirect()->to('symptom/all');
                    }
        
    }
    
    
    
    
}
