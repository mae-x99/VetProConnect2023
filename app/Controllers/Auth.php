<?php

namespace App\Controllers;
use App\Models\userModel;

class Auth extends BaseController
{
    
    public function index()
    {
          helper(['form']);
        $data = [];
        
        echo view('login', $data);
    }
    
    public function register_callback()
    {
        
        echo view('auth/register');
    }
    
    
    public function forget_callback()
    {
        
        echo view('auth/forgetpass');
    }
    
    
    public function resetpass_callback($email,$token)
    {
    	$userModel = new UserModel();
        $check_token = $userModel->where('email', $email)->where('token',$token)->first();
        if($check_token)
        {
        	$data['user'] = $check_token;
        	 echo view('auth/resetpass',$data);
        }else
        {
        	return redirect()->to('/');
        }
       
    }
    
    
    //storing user
    public function store()
    {
        $session = session();
        helper(['form']);
        $userModel = new userModel();
        $email_exists = $userModel->check_email($this->request->getVar('email'));

			if($email_exists == false) {
            $data = [
                'first_name'     => $this->request->getVar('f_name'),
                'last_name'     => $this->request->getVar('l_name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_type'     => $this->request->getVar('user_type'),
            ];
            $userModel->save($data);
            if($this->request->getVar('user_type') == 'doctor')
            {
            	$html = '<p>Dear '.$this->request->getVar('f_name').' '.$this->request->getVar('l_name').',</p>';
	            $html .= '<p>Congratulations on successfully registering as a doctor on our Web-Based Veterinary Clinic Management System! We are thrilled to have you join our platform and look forward to working with you to provide top-quality care for your patients.</p>';
	            $html .= '<p>As a registered doctor, you will have access to a range of features and tools that will help you manage your appointments, and clinic operations more efficiently. </p>';
	            $html .= '<p>We would like to remind you that you can access your account by logging in to our website with the email address and password you provided during registration. If you have any questions or need assistance, please don\'t hesitate to reach out to the admin.</p>';
				$html .= '<p>Thank you, and we wish you all the best in your practice.</p>';
	            $html .= '<p>Best regards,<br>MaexVet</p>';
                
                
            }else
            {
            	$html = '<p>Dear '.$this->request->getVar('f_name').' '.$this->request->getVar('l_name').',</p>';
	            $html .= '<p>Congratulations on successfully registering as a patient on our Web-Based Veterinary Clinic Management System! We are thrilled to have you as a part of our community.</p>';
	            $html .= '<p>With our system, you will have access to a variety of features that will make managing your pet\'s health care more convenient than ever before. You can easily schedule appointments, view your pet\'s medical records, and receive reminders for upcoming appointments and vaccinations.</p>';
	            $html .= '<p>To get started, simply log in to your account using the email address and password you provided during registration. If you have any questions or need assistance, please do not hesitate to contact us.</p>';
				$html .= '<p>We look forward to serving you and your furry friend in the future.</p>';
	            $html .= '<p>Best regards,<br>MaexVet</p>';
            }
            
            
            
	        $email = \Config\Services::email();
		    $email->setTo($this->request->getVar('email'));
		    $email->setFrom('admin@maexvet.com', 'MAEXVET CLINIC');
		        
		    $email->setSubject('MAEXVET CLINIC | Registration');
		    $email->setMessage($html);
		    $email->send();
            $session->setFlashdata('success', 'You Registered Successfully');
            return redirect()->to('user/register');
        }
        else{
            $data['error'] = 'Email already Exists';
            echo view('auth/register', $data);
        }

    }
    
    
    
     public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' 			=> $data['id'],
                    'first_name' 	=> $data['first_name'],
                    'phone' 		=> $data['phone'],
                    'last_name' 	=> $data['last_name'],
                    'email' 		=> $data['email'],
                    'user_type' 	=> $data['user_type'],
                    'profile_pic'	=> $data['profile_pic'],
                    'isLoggedIn' 	=> TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/');
        }
    }
    
    
    public function forget()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        
        
        $data = $userModel->where('email', $email)->orwhere('phone',$email)->first();
        
        if($data){
           $token = md5(rand());

            // Update Database
            $form_data = array(
                'token' => $token
            );
            
            $userModel->update($data['id'],$form_data);
            $msg = '<p>To reset your password, please <a href="'.base_url().'/user/reset-password/'.$data['email'].'/'.$token.'">click here</a> and enter a new password';
             $email = \Config\Services::email();
	        $email->setTo($data['email']);
	        $email->setFrom('admin@weedstopshop.com', 'Reset Password');
	        
	        $email->setSubject('Reset Password');
	        $email->setMessage($msg);
			if($email->send())
			{
				$success = '<p>An email is sent to your email address. Please follow instructions and reset the password</p>';
	            $session->setFlashdata('msg', $success);
	            return redirect()->to('/user/forgetpass');
			}else
			{
				$data = $email->printDebugger(['headers']);
            	
				$session->setFlashdata('msg', $data);
            	return redirect()->to('/user/forgetpass');
			}

            
        }else{
            $session->setFlashdata('msg', 'Please enter correct Email Or Phone Number');
            return redirect()->to('/user/forgetpass');
        }
    }
    
    public function updatepassword()
    {
        $session 	= session();
        $userModel 	= new UserModel();
        $password 	= $this->request->getVar('password');
        $c_password = $this->request->getVar('c_password');
        $user_id 	= $this->request->getVar('user_id');
        
           //$token = md5(rand());

            // Update Database
            $form_data = array(
                'token' 			=> '',
                'password'	=> password_hash($password, PASSWORD_DEFAULT),
            );
            
            $userModel->update($user_id,$form_data);
           
            
			
			$success = '<p>Password Updated Successfully</p>';
            $session->setFlashdata('msg', $success);
            return redirect()->to('/');
			

            
        
    }
    
    	public function logout()
			{
                $session = session();
                $session->destroy();	?>
				<script type="text/javascript">
					localStorage.ids='undefined';
				</script>
				<?php
                return redirect()->to('/');

			}
			
			
		 public function profile()
            {
                 $userModel = new UserModel();
                 $user_id = $_SESSION['id'];
                 
                 
		        $data['users'] = $userModel->getUsers($user_id);
                 
        		return $this->render_template('admin/profile',$data);
        
            }
            
            
         public function update_profile()
            {   
                $session = session();
                $userModel = new UserModel();
                $id = $this->request->getVar('user_id');
               
                if($this->request->getFile('file') != '')
                {
                	$validateImage = $this->validate([
											            'file' => [
											                'uploaded[file]',
											                'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
											                'max_size[file, 4096]',
											            ],
											        ]);
					
                    
                    if($validateImage)
                    {
                    	 $imageFile = $this->request->getFile('file');
           				 $imageFile->move('uploads');
           				 $session->set(array('profile_pic' => $imageFile->getClientName(),'phone' => $this->request->getVar('phone')));
           				 
           				 $data=array(
				                    'first_name' 		=> $this->request->getVar('first_name'),
				                    'last_name' 		=> $this->request->getVar('last_name'),
				                    'email' 			=> $this->request->getVar('email'),
				                    'phone' 			=> $this->request->getVar('phone'),
				                    'city' 				=> $this->request->getVar('city'),
				                    'zipcode' 			=> $this->request->getVar('zipcode'),
				                    'address' 			=> $this->request->getVar('address'),
				                    'profile_pic'		=> $imageFile->getClientName(),
			                    );
           				 
                    }else
                    {
                    	$session->setFlashdata('Error', 'Select Valid image');
                    	return redirect()->to('admin/profile');	
                    }
                    					        
                }else
                {
                	$session->set(array('phone' => $this->request->getVar('phone')));
                	$data=array(
				                    'first_name' => $this->request->getVar('first_name'),
				                    'last_name' => $this->request->getVar('last_name'),
				                    'email' => $this->request->getVar('email'),
				                    'phone' => $this->request->getVar('phone'),
				                    'city' => $this->request->getVar('city'),
				                    'zipcode' => $this->request->getVar('zipcode'),
				                    'address' => $this->request->getVar('address')
			                    );
                }
                
                
                   
                   $update = $userModel->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                   return redirect()->to('admin/profile');
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                        return redirect()->to('admin/profile');
                    }
                    
            }
    
    
    
    
    
}
