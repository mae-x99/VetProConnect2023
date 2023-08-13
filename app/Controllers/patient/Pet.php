<?php

namespace App\Controllers\patient;
use App\Controllers\BaseController;
use App\Models\petModel;

class Pet extends BaseController
{
    public function index()
    {
         $session = session();
        $data['p_id'] = $_SESSION['id'];
        
		return $this->render_template('patient/pet/add_new',$data);

    }
     public function view_all()
    {
        $session = session();
        $Model = new petModel();
        $data['pets'] = $Model->getPetsByOwner($_SESSION['id']);
		return $this->render_template('patient/pet/view_all',$data);

    }
    
    public function edit($id = null)
    {
        $session = session();
        $Model = new petModel();
        $data['pet'] = $Model->getPets($id);
		return $this->render_template('patient/pet/edit',$data);

    }
    
    
      public function store(){
        $session = session();
        $Model = new petModel();
        
         $data=array(
                    'owner_id' => $this->request->getVar('p_id'),
                    'name' => $this->request->getVar('name'),
                    'age' => $this->request->getVar('age'),
                    'breed' => $this->request->getVar('breed'),
                    'weight' => $this->request->getVar('weight'),
                    'gender' => $this->request->getVar('gender'),
                    );
        
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('pet/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('pet/add');
                    }
        
    }
    
    
    
    
    
     public function update(){
        $session = session();
        $Model = new petModel();
        $id = $this->request->getVar('id');
       $data=array(
                    'name' => $this->request->getVar('name'),
                    'age' => $this->request->getVar('age'),
                    'breed' => $this->request->getVar('breed'),
                    'weight' => $this->request->getVar('weight'),
                    'gender' => $this->request->getVar('gender'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('pet/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('pet/all');
                    }
        
    }
    
    
    
    
     public function delete($id = null){
        $session = session();
        $Model = new petModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   return redirect()->to('pet/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        return redirect()->to('pet/all');
                    }
        
    }
    
    
    
    
}
