<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;

class Doctor extends BaseController
{
    public function index()
    {

		return $this->render_template('admin/doctor/add_new');

    }
     public function view_all()
    {
        
         $session = session();
        $Model = new userModel();
        $data['doctors'] = $Model->getUsersByType('doctor');
        
		return $this->render_template('admin/doctor/view_all',$data);

    }
    
    
        public function delete($id = null){
        $session = session();
        $Model = new userModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   
                               return redirect()->to('doctor/all');
                   
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        
                               return redirect()->to('doctor/all');
                        
                    }
        
    }
    
    
    
    //add new user doctor or Per Owner
    public function user_register_callback(){
        
           $session = session();
        helper(['form']);
        $userModel = new userModel();
        $email_exists = $userModel->check_email($this->request->getVar('email'));
        $type = $this->request->getVar('type');
			if($email_exists == false) {
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'phone'     => $this->request->getVar('phone'),
                'city'     => $this->request->getVar('city'),
                'zipcode'     => $this->request->getVar('zipcode'),
                'address'     => $this->request->getVar('address'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'     => $type,
            ];
           
            $userModel->save($data);
            $session->setFlashdata('success', 'User Registered Successfully');
            
             if($type == 'doctor'){
           return redirect()->to('doctor/add'); }
            else{
                return redirect()->to('admin/pateint/add');
            }
            
            
        }
        else{
            $data['error'] = 'Email already Exists';
            if($type == 'doctor'){
            echo view('doctor/add', $data); }
            else{
            echo view('admin/pateint/add', $data);
            }
        }
        
    }
    
    
    
    
    //update user 
    public function edit_callback($id){
        
        $session = session();
        $Model = new userModel();
        $data['user'] = $Model->getUsers($id);
        return $this->render_template('admin/doctor/edit',$data);
        
    }
    
    
    //update user
      
    //update new user doctor or Per Owner
    public function update_user_callback(){
        
        $session = session();
        helper(['form']);
        $userModel = new userModel();
        
        $email = $this->request->getVar('email');
        
        $id = $this->request->getVar('id');
        
        $user = $userModel->getUsers($id);
       
        $user_old_email = $user[0]['email'];
        
        $password = $this->request->getVar('password');
        
        if($email != $user_old_email){
        
        $email_exists = $userModel->check_email($this->request->getVar('email'));
        
        if($email_exists == false) {
        
          $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'phone'     =>   $this->request->getVar('phone'),
                'city'     =>   $this->request->getVar('city'),
                'zipcode'     => $this->request->getVar('zipcode'),
                'address'     => $this->request->getVar('address'),
                'email'     =>   $email
            ];
            
            if($password != ''){
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            

            $update = $userModel->update($id, $data);
            
            if($update){
            $session->setFlashdata('success', 'User Updated Successfully');
             return redirect()->to('edit/user/'.$id);
            
            }
        
        
        }else{
            
             $session->setFlashdata('error', 'Email Already Exist');
             return redirect()->to('edit/user/'.$id);
             
        }//else
        
        }//if
        else{
      
            $type = $this->request->getVar('type');
        
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'phone'     => $this->request->getVar('phone'),
                'city'     => $this->request->getVar('city'),
                'zipcode'     => $this->request->getVar('zipcode'),
                'address'     => $this->request->getVar('address'),
            ];
            
            if($password != ''){
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            

            $update = $userModel->update($id, $data);
            
            if($update){
            $session->setFlashdata('success', 'User Updated Successfully');
             return redirect()->to('edit/user/'.$id);
            
            }
            
        }//else
        
    }//end function
    
    
    
    
    
    
    
}
