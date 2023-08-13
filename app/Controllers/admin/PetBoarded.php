<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\petModel;
use App\Models\boardModel;

class PetBoarded extends BaseController
{
    public function index()
    {
         $session = session();
        $Model = new userModel();
        $data['pateints'] = $Model->getUsersByType('patient');
        
		return $this->render_template('admin/pet/add_new',$data);

    }
     public function view_all()
    {
         $session = session();
        $Model = new boardModel();
        $data['boards'] = $Model->getBoards();
		return $this->render_template('admin/pet/view_all',$data);

    }
    
    public function get_pet(){
        
        $id = $this->request->getVar('id');
        $session = session();
        $Model = new petModel();
        $pets = $Model->getPetsByOwner($id);
        foreach($pets as $pet){
            ?>
            <option value="<?= $pet['id']; ?>"><?= $pet['name']; ?></option>
            <?php
        }
        
    }
      public function edit($id = null)
    {
        $session = session();
        $Model = new boardModel();
        $userModel = new userModel();
        $data['pateints'] = $userModel->getUsersByType('patient');
        $data['board'] = $Model->getBoards($id);
		return $this->render_template('admin/pet/edit',$data);

    }
    
    
    
       public function store(){
        $session = session();
        $Model = new boardModel();
        
         $data=array(
                    'patient_id' => $this->request->getVar('p_id'),
                    'pet_id' => $this->request->getVar('pet_id'),
                    'status' => $this->request->getVar('purpose'),
                    'check_in' => $this->request->getVar('check_in'),
                    'check_out' => $this->request->getVar('check_out'),
                    );
                    
       
        
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   return redirect()->to('board/add');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                        return redirect()->to('board/add');
                    }
        
    }
    
    
    
    
    
     public function update(){
        $session = session();
        $Model = new boardModel();
        $id = $this->request->getVar('id');
         $data=array(
                    'patient_id' => $this->request->getVar('p_id'),
                    'pet_id' => $this->request->getVar('pet_id'),
                    'status' => $this->request->getVar('purpose'),
                    'check_in' => $this->request->getVar('check_in'),
                    'check_out' => $this->request->getVar('check_out'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('board/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('board/all');
                    }
        
    }
    
    
    
    
    
    public function delete($id = null){
        $session = session();
        $Model = new boardModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   return redirect()->to('board/all');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        return redirect()->to('board/all');
                    }
        
    }
    
    
    
    
}
