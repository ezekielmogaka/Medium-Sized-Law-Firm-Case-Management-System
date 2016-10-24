<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
 	{ 
 		parent::__construct();
 		$this->load->model('Hrmodel');
 		$this->load->model('Adminmodel');
 		
 		
 		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
 	}
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('hr/hr_login');
	}

	public function hr_login(){
 		if(null == $this->input->post('hr_email') && null == $this->input->post('hr_pass')){
 			$this->index();
 		}else{

 			$this->form_validation->set_rules('hr_email','Email','required|trim');
 			$this->form_validation->set_rules('hr_pass','Password','required|trim');
 			
 			$password=md5($this->input->post('hr_pass'));

 			if($this->form_validation->run()){
 				//compare values with those in the db
 				$hr_credentials = array(
 					                    'hr_email'=> $this->input->post('hr_email'),
 					                     'hr_password'=>$password
 					                     );

 				$user_details = $this->Hrmodel->check_hr_credentials($hr_credentials);

 				if(gettype($user_details) == "string"){
 					$data['server_reply'] = "<div class='alert alert-danger'><i class='fa fa-warning'></i>".$user_details."</div>";
 					$this->load->view('hr/hr_login',$data);
 				}else{

 					$session_data = array(
 						             'hr_email'=>$this->input->post('hr_email'),
 						             'user_name'=>$user_details['first_name']." ".$user_details['last_name']
 						             );
 					$this->session->set_userdata($session_data);

 					 $this->hr_dashboard();

 				}


 			}else{
 				//Show errors to the user
 				$data['server_reply'] = "<div class='alert alert-warning'>".validation_errors()."</div>";

 				$this->load->view('hr/hr_login',$data);

 			}


 		}
 	}


 	 	public function hr_dashboard(){
 		if(null == $this->session->userdata('hr_email')){
 			
 			$this->index();
 		}
 		else{		
 			$data['page'] = 'hr_dashboard.php';
 			$data['active_page'] = "Dashboard";
 			$data['name'] = "Leave Applications";
 			$data['leave'] = $this->Hrmodel->get_all_leave_applications();
 			$data['page_title'] = "Human Resource Dashbard";
 			$this->load->view('hr/index.php',$data);
 			

 		}
 	}

 	public function logout(){
 		if(!null == $this->session->userdata('hr_email')){
 			//$this->session->session_destroy();
 			unset($_SESSION['hr_email']);
 			unset($_SESSION['user_name']);

 			$this->index();
 		}else{

 			$this->hr_dashboard();

 			
 			//$this->session->sess_destroy();
 		}

 	}

 	public function sidebar(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$info['advance_applications'] = $this->Hrmodel->get_all_advance();
 			$info['leave_applications'] = $this->Hrmodel->get_all_leave();
 			$info['attorneys_counter'] = $this->Hrmodel->get_all_attorneys();
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

 	public function new_attorney(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$value['page_title'] = 'Add new attorney';
 			$value['page'] = 'new_attorney.php';
 			$value['active_page'] = "Add new attorney";
 			$this->load->view('hr/index.php',$value);
 		}
 	}

 	public function manage_attorneys(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$info['attorneys'] = $this->Adminmodel->get_all_attorneys();
 			$info['page_title'] = "Manage Attorneys";	   
	   		$info['page'] = "manage_attorneys.php";
	   		$info['active_page'] = "Manage Attorneys";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

 		public function delete_attorney($attorney_id){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			
 			$this->Hrmodel->delete_attorney($attorney_id);
 			$this->manage_attorneys();
 			
 			
 		}
 	}

 	public function edit_attorney($attorney_id){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{

  
	   		$data_to_view['page'] = "edit_attorney.php";
	   		$data_to_view['attorney_details'] = $this->Adminmodel->get_attorney_details($attorney_id);
	   		$data_to_view['attorney_id'] = $attorney_id;
	   		$data_to_view['active_page'] = "Edit Attorney";
	   		$data_to_view['page_title'] = "Edit Attorney";
	   		$this->load->view('hr/index.php',$data_to_view);
 		}

 	}

 	 	public function submit_edited_attorney(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			
 			    $this->form_validation->set_rules('attorney_id', 'attorney ID','required|trim');
 				$this->form_validation->set_rules('attorney_first_name', 'Attorney FirstName','required|max_length[50]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_last_name', 'Attorney LastName','required|max_length[50]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_speciality', 'Atorney Speciality','required|max_length[50]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_phone', 'Attorney Phone','required|max_length[15]|min_length[8]|trim');
 				$this->form_validation->set_rules('attorney_email', 'Attorney Email','required|max_length[50]|trim');
 				$this->form_validation->set_rules('attorney_password', 'Password','required|max_length[50]|trim');
 				$this->form_validation->set_rules('attorney_notes', 'Attorney Profile','required|max_length[5000]|min_length[100]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				

 				$attorney_id = $this->input->post('attorney_id');
 				

 				

 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'edit_client.php';
 					$data_for_view['page_title'] = "Edit Client";
 			        $this->load->view('hr/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
	                  'attorney_first_name'=>$this->input->post('attorney_first_name'),
	                  'attorney_last_name'=>$this->input->post('attorney_last_name'),
	                  'attorney_speciality'=>$this->input->post('attorney_speciality'),
	                  'employment_status'=>$this->input->post('employment_status'),
	                  'attorney_phone'=>$this->input->post('attorney_phone'),
	                  'employmentDate'=>$this->input->post('employmentDate'),
	                  'nssfNo'=>$this->input->post('nssfNo'),
	                  'nhifNo'=>$this->input->post('nhifNo'),
	                  'attorney_email'=>$this->input->post('attorney_email'),
	                  'attorney_password'=>$this->input->post('attorney_password'),
	                  'attorney_notes'=>$this->input->post('attorney_notes')
	               
			         );


                   $this->Hrmodel->update_attorney($attorney_id,$data_to_model);

                   $this->manage_attorneys();


 				}
 			
 		}

 	}


 	public function pending_leave_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "pending";
 			$info['pending_leave_applications'] = $this->Hrmodel->get_leave_applications($status);
 			$info['page_title'] = "Manage Pending Leave Applications";	   
	   		$info['page'] = "manage_pending_leave_applications.php";
	   		$info['active_page'] = "Manage Pending Leave Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

 	
 	public function accept_or_reject_leaveApplication(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			
 			    $this->form_validation->set_rules('leave_application_id', 'leave application ID','required');
 			     $this->form_validation->set_rules('status', 'Leave application Status','required');
 				
 				$this->form_validation->set_rules('status_reason', 'Reasn for the Accepting/Rejecting the application','required|max_length[5000]|min_length[20]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				

 				$leave_id = $this->input->post('leave_application_id');
 				
 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'manage_pending_leave_applications.php';
 					$data_for_view['page_title'] = "Leave Applications";
 			        $this->load->view('hr/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
 						 'status'=>$this->input->post('status'),
	                  'status_reason'=>$this->input->post('status_reason')
	                  
	               
			         );


                   $this->Hrmodel->accept_or_reject_leave_application($leave_id,$data_to_model);

                   $this->pending_leave_applications();


 				}
 			
 		}

 	}

 	
 	public function approved_leave_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "accepted";
 			$info['pending_leave_applications'] = $this->Hrmodel->get_leave_applications($status);
 			$info['page_title'] = "Manage Approved Leave Applications";	   
	   		$info['page'] = "manage_pending_leave_applications.php";
	   		$info['active_page'] = "Manage Approved Leave Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

public function rejected_leave_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "rejected";
 			$info['pending_leave_applications'] = $this->Hrmodel->get_leave_applications($status);
 			$info['page_title'] = "Manage Rejected Leave Applications";	   
	   		$info['page'] = "manage_pending_leave_applications.php";
	   		$info['active_page'] = "Manage Rejected Leave Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

 	
 	public function pending_advance_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "pending";
 			$info['advance_applications'] = $this->Hrmodel->get_advance_applications($status);
 			$info['page_title'] = "Pending Advance Applications";	   
	   		$info['page'] = "manage_advance_applications.php";
	   		$info['active_page'] = "Manage Pending Leave Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

public function approved_advance_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "accepted";
 			$info['advance_applications'] = $this->Hrmodel->get_advance_applications($status);
 			$info['page_title'] = "Approved Advance Applications";	   
	   		$info['page'] = "manage_advance_applications.php";
	   		$info['active_page'] = "Approved Advance Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

public function rejected_advance_applications(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			$status = "rejected";
 			$info['advance_applications'] = $this->Hrmodel->get_advance_applications($status);
 			$info['page_title'] = "Rejected Advance Applications";	   
	   		$info['page'] = "manage_advance_applications.php";
	   		$info['active_page'] = "Rejected Advance Applications";
	   		$this->load->view('hr/index.php',$info);
 		}

 	}

 	
 	public function accept_or_reject_advanceApplication(){
 		if(null == $this->session->userdata('hr_email')){
 			$this->index();
 		}else{
 			
 			    $this->form_validation->set_rules('advance_application_id', 'leave application ID','required');
 			     $this->form_validation->set_rules('status', 'Advance application Status','required');
 				
 				$this->form_validation->set_rules('status_reason', 'Reasn for the Accepting/Rejecting the application','required|max_length[5000]|min_length[20]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				

 				$advance_id = $this->input->post('advance_application_id');
 				
 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'manage_advance_applications.php';
 					$data_for_view['page_title'] = "Advance Salary Applications";
 			        $this->load->view('hr/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
 						 'status'=>$this->input->post('status'),
	                  'status_reason'=>$this->input->post('status_reason')
	                  
	               
			         );


                   $this->Hrmodel->accept_or_accept_advance_application($advance_id,$data_to_model);

                   $this->approved_advance_applications();


 				}
 			
 		}

 	}




}
