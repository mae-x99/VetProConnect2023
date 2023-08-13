<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


/* =======================================================================
                                Auth Routes
   =====================================================================*/
   
   $routes->post('user/store', 'Auth::store');
   $routes->post('user/login', 'Auth::login');
   $routes->post('user/forget', 'Auth::forget');
   $routes->post('user/updatepassword', 'Auth::updatepassword');
   $routes->get('user/reset-password/(:any)/(:any)', 'Auth::resetpass_callback/$1/$2');
   $routes->get('user/register', 'Auth::register_callback');
   $routes->get('user/forgetpass', 'Auth::forget_callback');
   $routes->get('logout', 'Auth::logout');
   $routes->get('admin/profile', 'Auth::profile',['filter' => 'authGuard']);
   $routes->post('update/profile', 'Auth::update_profile');
   
   
   
/* =======================================================================
                                Admin Routes
   =====================================================================*/
   $routes->get('dashboard', 'Home::dashboard',['filter' => 'authGuard']);
   
   $routes->post('admin/store/user','admin\Doctor::user_register_callback',['filter' => 'authGuard']);
   $routes->get('edit/user/(:num)', 'admin\Doctor::edit_callback/$1',['filter' => 'authGuard']);
   $routes->post('admin/update/user','admin\Doctor::update_user_callback',['filter' => 'authGuard']);
   
   //doctors
   $routes->get('doctor/add', 'admin\Doctor::index',['filter' => 'authGuard']);
   $routes->get('doctor/all', 'admin\Doctor::view_all',['filter' => 'authGuard']);
   $routes->get('doctor/delete/(:num)', 'admin\Doctor::delete/$1');
   
   //Patients
   $routes->get('admin/pateint/add', 'admin\Patient::index',['filter' => 'authGuard']);
   $routes->get('admin/patient/all', 'admin\Patient::view_all',['filter' => 'authGuard']);
   $routes->get('patient/delete/(:num)', 'admin\Patient::deleted/$1');
   
   
   $routes->get('admin/pet/add/(:num)', 'admin\Patient::add_pet/$1',['filter' => 'authGuard']);
   $routes->get('admin/pet/all/(:num)', 'admin\Patient::view_all_patent/$1',['filter' => 'authGuard']);
   $routes->post('admin/pet/add_new', 'admin\Patient::add_new_pet',['filter' => 'authGuard']);
   $routes->get('adminpet/delete/(:num)', 'admin\Patient::deleted/$1');
   
   
   //Appointments
   $routes->get('appointment/add', 'admin\Appointment::index',['filter' => 'authGuard']);
   $routes->get('appointment/send_reminder', 'admin\Appointment::send_reminder',['filter' => 'authGuard']);
   $routes->get('appointment/all', 'admin\Appointment::view_all',['filter' => 'authGuard']);
   $routes->get('appointment/admin/edit/(:num)', 'admin\Appointment::edit_admin/$1');
   $routes->post('appointment/get/pets', 'admin\Appointment::get_pets');
   $routes->get('appointment/send_reminder/appointment/(:num)/(:num)', 'admin\Appointment::send_reminders/$1/$2');
   
   
   //Services
   $routes->get('service/add', 'admin\Services::index',['filter' => 'authGuard']);
   $routes->get('service/all', 'admin\Services::view_all',['filter' => 'authGuard']);
   $routes->get('service/edit/(:num)', 'admin\Services::edit/$1');
   $routes->get('service/delete/(:num)', 'admin\Services::delete/$1');
   $routes->post('service/store', 'admin\Services::store');
   $routes->post('service/update', 'admin\Services::update');
   
   
   //Pet Boarded
   $routes->get('board/add', 'admin\PetBoarded::index',['filter' => 'authGuard']);
   $routes->get('board/all', 'admin\PetBoarded::view_all',['filter' => 'authGuard']);
   $routes->post('board/getPet/', 'admin\PetBoarded::get_pet');
   $routes->get('board/edit/(:num)', 'admin\PetBoarded::edit/$1');
   $routes->get('board/delete/(:num)', 'admin\PetBoarded::delete/$1');
   $routes->post('board/store', 'admin\PetBoarded::store');
   $routes->post('board/update', 'admin\PetBoarded::update');


    
   //Medication
   $routes->get('medicne/add', 'admin\Medication::index',['filter' => 'authGuard']);
   $routes->get('medicne/all', 'admin\Medication::view_all',['filter' => 'authGuard']);
   $routes->get('medicne/edit/(:num)', 'admin\Medication::edit/$1');
   $routes->get('medicne/delete/(:num)', 'admin\Medication::delete/$1');
   $routes->post('medicne/store', 'admin\Medication::store');
   $routes->post('medicine/update', 'admin\Medication::update');
   
   
   
   //Medication
   $routes->get('symptom/add', 'admin\Symptom::index',['filter' => 'authGuard']);
   $routes->get('symptom/all', 'admin\Symptom::view_all',['filter' => 'authGuard']);
   $routes->get('symptom/edit/(:num)', 'admin\Symptom::edit/$1');
   $routes->get('symptom/delete/(:num)', 'admin\Symptom::delete/$1');
   $routes->post('symptom/store', 'admin\Symptom::store');
   $routes->post('symptom/update', 'admin\Symptom::update');


    //invoice
   $routes->get('invoice/add', 'admin\Invoice::index',['filter' => 'authGuard']);
   $routes->get('invoice/all', 'admin\Invoice::view_all',['filter' => 'authGuard']);
   $routes->post('invoice/service/price', 'admin\Invoice::get_service_price');
   $routes->post('invoice/medicine/price', 'admin\Invoice::get_medicine_price');
   $routes->post('invoice/store', 'admin\Invoice::store');
   $routes->get('invoice/delete/(:num)', 'admin\Invoice::delete/$1');
   $routes->get('billing/report/print/(:num)', 'admin\Invoice::billing_report_print/$1');
   $routes->get('patient/invoice', 'admin\Invoice::patient_all',['filter' => 'authGuard']);



/* =======================================================================
                                Patient Routes
   =====================================================================*/
    
   //Pets
   $routes->get('pet/add', 'patient\Pet::index',['filter' => 'authGuard']);
   $routes->get('pet/all', 'patient\Pet::view_all',['filter' => 'authGuard']);
   $routes->get('pet/edit/(:num)', 'patient\Pet::edit/$1');
   $routes->get('pet/delete/(:num)', 'patient\Pet::delete/$1');
   $routes->post('pet/store', 'patient\Pet::store');
   $routes->post('pet/update', 'patient\Pet::update');
   
   
   //Appointment
   
   $routes->get('appointment/add_new', 'admin\Appointment::add_appointment',['filter' => 'authGuard']);
   $routes->get('appointment/view_all', 'admin\Appointment::all_appointment',['filter' => 'authGuard']);
   $routes->get('appointment/edit/(:num)', 'admin\Appointment::edit/$1');
   $routes->get('appointment/delete/(:num)', 'admin\Appointment::delete/$1');
   $routes->post('appointment/getSlots', 'admin\Appointment::get_slots');
   $routes->post('appointment/store', 'admin\Appointment::store');
   $routes->post('appointment/update', 'admin\Appointment::update');








/* =======================================================================
                                Doctor Routes
   =====================================================================*/
   
    //timeslot
    
   $routes->get('slot/add', 'doctor\slotController::index',['filter' => 'authGuard']);
   $routes->get('slot/all', 'doctor\slotController::view_all',['filter' => 'authGuard']);
   $routes->get('slot/delete/(:num)', 'doctor\slotController::delete/$1');
   $routes->post('slot/store', 'doctor\slotController::store');
   $routes->post('slot/update', 'doctor\slotController::update');
   
   
   //appointment
   $routes->post('doctor/appointment_store', 'admin\Appointment::store_docotr'); 
   $routes->get('doctor/all_appointment', 'admin\Appointment::doctor_all',['filter' => 'authGuard']);
   $routes->get('doctor/followup_appointment/(:num)', 'admin\Appointment::follow_up_appointment/$1',['filter' => 'authGuard']);
   $routes->get('doctor/today_appointment', 'admin\Appointment::doctor_today',['filter' => 'authGuard']);
   $routes->get('doctor/start_appointment/(:num)', 'admin\Appointment::startAppointment/$1',['filter' => 'authGuard']);
   $routes->get('doctor/edit_appointment/(:num)', 'admin\Appointment::editAppointment/$1',['filter' => 'authGuard']);
   
   //reports
   $routes->get('patient/reports/all', 'admin\Reports::all_patient_reports',['filter' => 'authGuard']);
   

   $routes->get('doctor/medicne/all', 'admin\Medication::view_all_medicine',['filter' => 'authGuard']);




/* =======================================================================
                                Reports Routes
   =====================================================================*/
    
   $routes->post('report/pateint/store', 'admin\Reports::add_patient_report');
   $routes->post('report/pateint/update', 'admin\Reports::update_patient_report');
   $routes->get('patient/report/print/(:num)', 'admin\Reports::patient_report_print/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
