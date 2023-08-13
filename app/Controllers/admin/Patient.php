<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\petModel;

class Patient extends BaseController
{
    public function index()
    {

		return $this->render_template('admin/patient/add_new');

    }
     public function view_all()
    {
         
         $session = session();
        $Model = new userModel();
        $data['doctors'] = $Model->getUsersByType('patient');
		return $this->render_template('admin/patient/view_all',$data);
		

    }
    public function deleted($id = null){
        $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        
        $deleted = $Model->where('id', $id)->delete();
        $deleted_pet = $petModel->where('owner_id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   
                               return redirect()->to('admin/patient/all');
                   
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        
                               return redirect()->to('admin/patient/all');
                        
                    }
        
    }
    
    
    
    public function view_all_patent($id)
    {
         
        $session = session();
        $Model = new petModel();
        $data['pets'] = $Model->getPetsByOwner($id);
       	$Model = new userModel();
        $data['petowne'] = $Model->getUsers($id);
		return $this->render_template('admin/patient/pet/view_all',$data);
		

    }
    
    
    public function add_pet($id)
    {
         
        $session = session();
        
       	$Model = new userModel();
        $data['petowne'] = $Model->getUsers($id);
		return $this->render_template('admin/patient/pet/add_new',$data);
		

    }
    
    public function add_new_pet()
    {
    	$session 	= session();
        $Model 		= new petModel();
        $name 		= $this->request->getVar('name');
        $breed 		= $this->request->getVar('breed');
        $age 		= $this->request->getVar('age');
        $weight 	= $this->request->getVar('weight');
        $gender 	= $this->request->getVar('gender');
        $owner_id 	= $this->request->getVar('owner_id');
        for($i=0;$i<count($name);$i++)
        {
        	$data = array(
        				 	'name' 		=> $name[$i],
        				 	'breed' 	=> $breed[$i],
        				 	'age' 		=> $age[$i],
        				 	'weight' 	=> $weight[$i],
        				 	'gender' 	=> $gender[$i],
        				 	'name' 		=> $name[$i],
        				 	'owner_id'	=> $owner_id
        				 );
        	$inserted = $Model->save($data);			 
        }
        
         if($inserted){
           $session->setFlashdata('success', 'Successfully Inserted');
           return redirect()->to('admin/pet/all/'.$owner_id);
         }else{
                 $session->setFlashdata('Error', 'Not Inserted');
                return redirect()->to('admin/pet/all/'.$owner_id);
        }
    }
    
    
}
