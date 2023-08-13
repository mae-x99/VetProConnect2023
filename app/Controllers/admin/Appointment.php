<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\petModel;
use App\Models\appointmentModel;
use App\Models\slotModel;
use App\Models\serviceModel;
use App\Models\medicineModel;
use App\Models\patReportModel;
use App\Models\symptomModel;

class Appointment extends BaseController
{
    public function index()
    {
        $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        $patient_id = $_SESSION['id'];
        
        $data['doctors'] = $Model->getUsersByType('doctor');
        $data['patients'] = $Model->getUsersByType('patient');
        
		return $this->render_template('admin/appointment/add_new',$data);

    }
     public function view_all()
    {
         $session = session();
        $Model = new appointmentModel();
        $data['appointments'] = $Model->getAppointments();

		return $this->render_template('admin/appointment/view_all',$data);

    }
     public function send_reminder()
    {
         $session = session();
        $Model = new appointmentModel();
        $data['appointments'] = $Model->getAppointmentspending();

		return $this->render_template('admin/appointment/send_reminder',$data);

    }
    
    
    
    public function send_reminders($user_id,$appointment_id)
    {
    	
    	$Model = new appointmentModel();
    	$appointment_details = $Model->getSingleAppointment($appointment_id);
    	
    	$session = session();
    	$Model = new userModel();
    	$get_user = $Model->getUsers($user_id);
    	
    	$msg = 'Dear '.$get_user[0]['first_name'].' '.$get_user[0]['last_name'].', this is a friendly reminder that your pet, '.$appointment_details[0]['name'].', has an upcoming appointment with us at Maex Veterinary Clinic on '.$appointment_details[0]['appointment_date'].' at '.$appointment_details[0]['slot'].'. Please let us know if you need to reschedule or if you have any questions. We look forward to seeing you and your pet soon. Best Regard, Maex Veterinary';
		   
        $email = \Config\Services::email();
	    $email->setTo($get_user[0]['email']);
	    $email->setFrom('vetclinicsystem99@gmail.com', 'Appointment Reminder');
	        
	    $email->setSubject('Appointment Reminder');
	    $email->setMessage($msg);
	    
	    if($get_user[0]['phone'] != '')
	    {
	    	 $user   = 'qM7e5lqd2v';
		     $pass   = 'CgPUuIEJhSUmOOwtNMWVSL72bYVylw0LdyuDlH6s';
		     $from   = '66688';
		     $to	 = $get_user[0]['phone'];
		     
		    $message = 'Dear'.$get_user[0]['first_name'].''.$get_user[0]['last_name'].', \r \rThis is a friendly reminder that your pet, '.$appointment_details[0]['name'].', has an upcoming appointment with us at Maex Veterinary Clinic on '.$appointment_details[0]['appointment_date'].' at '.$appointment_details[0]['slot'].'. \r \rPlease let us know if you need to reschedule or if you have any questions. We look forward to seeing you and your pet soon. \r \rBest Regard, \rMaex Veterinary';
		   
		    $message =  rawurlencode($message);
		    $message_new = str_replace( "%5Cr", "%0A", $message );
		    
			
		    $url    = 'https://sms.360.my/gw/bulk360/v3_0/send.php';
		    $oldurl = $url . "?user=$user&pass=$pass&from=$from";
		    $newurl = $oldurl . "&to=".$to."&text=".$message_new;
			
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $newurl);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	        $sentResult = curl_exec($ch);
	        
	        
	        if ($sentResult == FALSE) {
	            echo 'Curl failed for sending sms to crm.. '.curl_error($ch);
	        }
	        curl_close($ch);
	    }   
	        

	       
			if($email->send())
			{
				$success = '<p>Reminder is sent to Pet Owner</p>';
	            $session->setFlashdata('success', $success);
	            return redirect()->to('/appointment/send_reminder');
			}else
			{
				$data = $email->printDebugger(['headers']);
            	
				$session->setFlashdata('error', $data);
            	return redirect()->to('/appointment/send_reminder');
			}
    }
    
    
    
    public function edit_admin($id){
        
       $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        $slotModel = new slotModel();
        $appointmentModel = new appointmentModel();
        
        $appoint =  $appointmentModel->where('id',$id)->find();
        var_dump($appoint);
        die;
        $patient_id = $appoint[0]['patient_id'];
        
        $data['doctors'] = $Model->getUsersByType('doctor');
        $data['pets'] = $petModel->getPetsByOwner($patient_id);
       $data['appointment'] = $appointmentModel->getSingleAppointment($id);
       
        $data['slot'] = $slotModel->getSlotByAppointment($id);
        
        
        return $this->render_template('admin/appointment/edit',$data);
        
    }
    
    
    
    public function get_pets(){
        $session = session();
        $petModel = new petModel();
        
       $id =  $this->request->getVar('id');
        $pets = $petModel->getPetsByOwner($id);
        foreach($pets as $row){ ?>
			<option value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
		<?php } 
    }
    
    
    
    
    
    
    // for patients
    
    public function add_appointment()
    {
        
         $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        $patient_id = $_SESSION['id'];
        
        $data['doctors'] = $Model->getUsersByType('doctor');
        $data['pets'] = $petModel->getPetsByOwner($patient_id);
        
		return $this->render_template('patient/appointment/add_new',$data);

    }
    
    public function follow_up_appointment($id)
    {
        
         $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        $patient_id = $_SESSION['id'];
        $Model2 = new appointmentModel();
        $single_appointment = $Model2->getSingleAppointment($id);
        
        $data['appointment'] = $single_appointment[0];
        $data['pets'] = $petModel->getPetsByOwner($single_appointment[0]['patient_id']);
        
		return $this->render_template('doctor/appointment/add_new_followup',$data);

    }
    
    
     public function all_appointment()
    {
         $session = session();
        $Model = new appointmentModel();
        $patient_id = $_SESSION['id'];
        $data['appointments'] = $Model->getAppointments($patient_id);
		return $this->render_template('patient/appointment/view_all',$data);

    }
    
      public function edit($id = null)
    {
        $session = session();
        $Model = new userModel();
        $petModel = new petModel();
        $slotModel = new slotModel();
        $appointmentModel = new appointmentModel();
        $appoint =  $appointmentModel->where('id',$id)->find();
        $patient_id = $appoint[0]['patient_id'];
        
      
        $data['doctors'] = $Model->getUsersByType('doctor');
        $data['pets'] = $petModel->getPetsByOwner($patient_id);
       $data['appointment'] = $appointmentModel->getSingleAppointment($id);
       
        $data['slot'] = $slotModel->getSlotByAppointment($id);
        
       
		return $this->render_template('patient/appointment/edit',$data);

    }
    
    
    public function get_slots(){
        
        $session = session();
        $Model = new appointmentModel();
        
       $doctor =  $this->request->getVar('doctor');
       $date =  $this->request->getVar('date');
        
       return $Model->get_available_slots($date,$doctor);
    }
    
    
    
    //doctor 
    
    public function doctor_all()
    {
         $session = session();
        $Model = new appointmentModel();
        $doctor_id = $_SESSION['id'];
        $data['appointments'] = $Model->getAppointmentsByDoctor($doctor_id);
		return $this->render_template('doctor/appointment/view_all',$data);

    }
    
    public function doctor_today()
    {
         $session = session();
        $Model = new appointmentModel();
        $doctor_id = $_SESSION['id'];
        $data['appointments'] = $Model->getAppointmentsByDoctor($doctor_id);
		return $this->render_template('doctor/appointment/today',$data);

    }
    
    public function startAppointment($id){
        
        $session = session();
        $appointmentModel = new appointmentModel();
        $medicineModel = new medicineModel();
        $serviceModel = new serviceModel();
        $symptomModel = new symptomModel();
        
        $data['medicines'] = $medicineModel->getMedicine();
        $data['symptom'] = $symptomModel->getSymptom();
        $data['services'] = $serviceModel->getServices();
        $data['appointment'] = $appointmentModel->getSingleAppointment($id);
        
		return $this->render_template('doctor/appointment/start_appointment',$data);
    }
    
       public function editAppointment($id){
        
        $session = session();
        $appointmentModel = new appointmentModel();
        $medicineModel = new medicineModel();
        $serviceModel = new serviceModel();
        $patReportModel = new patReportModel();
        $symptomModel = new symptomModel();
        
        $data['symptom'] = $symptomModel->getSymptom();
        $data['medicines'] = $medicineModel->getMedicine();
        $data['services'] = $serviceModel->getServices();
        $data['appointment'] = $appointmentModel->getSingleAppointment($id);
        $data['app_data'] = $patReportModel->getReports($id);
        
		return $this->render_template('doctor/appointment/edit_appointment',$data);
    }
    
    
    
    
    
    
     public function store(){
        $session = session();
        $Model = new appointmentModel();
        
        $user_type =$_SESSION['user_type'];
        
        if($user_type == 'admin'){
           $patient = $this->request->getVar('patient_id');
        }
        else{
            $patient = $_SESSION['id'];
        }
        
        $doctor_id = $this->request->getVar('doctor');
        
        $userModel = new userModel();
        $doctor = $userModel->getUsers($doctor_id);
        
         $data=array(
                    'date' => $this->request->getVar('date'),
                    'patient_id' => $patient,
                    'pet_id' => $this->request->getVar('pet'),
                    'status' => 'Pending',
                    'doctor_id' => $this->request->getVar('doctor'),
                    'doctor_name' => $doctor[0]['first_name'].' '.$doctor[0]['last_name'],
                    'timeslot' => $this->request->getVar('timeslot'),
                    );
                    
       
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/add');
                    }else{
                    	$msg = '<p>A new appointment is set! Please check your appointment list.';
                      
                    	$email = \Config\Services::email();
				        $email->setTo($_SESSION['email']);
				        $email->setFrom('vetclinicsystem99@gmail.com', 'MAEXVET CLINIC');
				        
				        $email->setSubject('MAEXVET CLINIC | APPPOINTMENT CONFIRMATION');
				        $email->setMessage($msg);
						if($email->send())
						{
							//$success = '<p>An email is sent to your email address. Please follow instructions and reset the password</p>';
				            //$session->setFlashdata('msg', $success);
				            return redirect()->to('appointment/add_new');
						}else
						{
							//$data = $email->printDebugger(['headers']);
			            	
							//$session->setFlashdata('msg', $data);
			            	return redirect()->to('appointment/add_new');
						}
                    	
                    	
                        
                    }
                    
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                       
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/add');
                    }else{
                        return redirect()->to('appointment/add_new');
                    }
                    
                    }
        
    }
    
    
    public function store_docotr(){
        $session = session();
        $Model = new appointmentModel();
        
        $user_type =$_SESSION['user_type'];
        
        $patient = $this->request->getVar('patient_id');
        
        
        $doctor_id = $this->request->getVar('doctor');
        
        $userModel = new userModel();
        $doctor = $userModel->getUsers($doctor_id);
        
         $data=array(
                    'date' => $this->request->getVar('date'),
                    'patient_id' => $patient,
                    'pet_id' => $this->request->getVar('pet'),
                    'status' => 'Pending',
                    'doctor_id' => $this->request->getVar('doctor'),
                    'doctor_name' => $doctor[0]['first_name'].' '.$doctor[0]['last_name'],
                    'timeslot' => $this->request->getVar('timeslot'),
                    );
                    
       
        $inserted = $Model->save($data);
        
        if($inserted){
                   $session->setFlashdata('success', 'Successfully Inserted');
                   
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/add');
                    }else{
                    	$msg = '<p>A new appointment is set! Please check your appointment list.';
                      
                    	$email = \Config\Services::email();
				        $email->setTo($_SESSION['email']);
				        $email->setFrom('vetclinicsystem99@gmail.com', 'MAEXVET CLINIC');
				        
				        $email->setSubject('MAEXVET CLINIC | APPOINTMENT CONFIRMATION');
				        $email->setMessage($msg);
						if($email->send())
						{
							//$success = '<p>An email is sent to your email address. Please follow instructions and reset the password</p>';
				            //$session->setFlashdata('msg', $success);
				            return redirect()->to('doctor/all_appointment');
						}else
						{
							//$data = $email->printDebugger(['headers']);
			            	
							//$session->setFlashdata('msg', $data);
			            	return redirect()->to('doctor/all_appointment');
						}
                    	
                    	
                        
                    }
                    
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Inserted');
                       
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/add');
                    }else{
                        return redirect()->to('appointment/add_new');
                    }
                    
                    }
        
    }
    
      public function update(){
        $session = session();
          $user_type =$_SESSION['user_type'];
        $Model = new appointmentModel();
        $id = $this->request->getVar('id');
          $data=array(
                    'date' => $this->request->getVar('date'),
                    'patient_id' => $this->request->getVar('patient_id'),
                    'pet_id' => $this->request->getVar('pet'),
                    'doctor_id' => $this->request->getVar('doctor'),
                    'timeslot' => $this->request->getVar('timeslot'),
                    );
        
        $update = $Model->update($id, $data);
                    if($update){
                   $session->setFlashdata('success', 'Successfully Updated');
                 
        
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/all');
                    }else{
                        return redirect()->to('appointment/view_all');
                    }
                    
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Updated');
                       
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/all');
                    }else{
                        return redirect()->to('appointment/view_all');
                    }
                    }
        
    }
    
    
    
    
    
    public function delete($id = null){
        $session = session();
          $user_type =$_SESSION['user_type'];
        $Model = new appointmentModel();
        
        $deleted = $Model->where('id', $id)->delete();
        
        if($deleted){
                   $session->setFlashdata('success', 'Successfully Deleted');
                   
                    if($user_type == 'admin'){
                               return redirect()->to('appointment/all');
                    }else{
                        return redirect()->to('appointment/view_all');
                    }
                   
                    }
                    else{
                         $session->setFlashdata('Error', 'Not Deleted');
                        
                         if($user_type == 'admin'){
                               return redirect()->to('appointment/all');
                    }else{
                        return redirect()->to('appointment/view_all');
                    }
                        
                    }
        
    }
    
    
}
