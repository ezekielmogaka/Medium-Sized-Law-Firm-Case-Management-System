<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
 		$this->load->model('Adminmodel');
 		
 		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
 	}
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('admin/login');
	}

	public function admin_login(){
 		if(null == $this->input->post('admin_email') && null == $this->input->post('admin_pass')){
 			$this->index();
 		}else{

 			$this->form_validation->set_rules('admin_email','Email','required|trim');
 			$this->form_validation->set_rules('admin_pass','Password','required|trim');
 			$password=md5($this->input->post('admin_pass'));

 			if($this->form_validation->run()){
 				//compare values with those in the db
 				$admin_credentials = array(
 					                    'admin_email'=> $this->input->post('admin_email'),
 					                     'admin_password'=>$password
 					                     );

 				$user_details = $this->Adminmodel->check_login_credentials($admin_credentials);

 				if(gettype($user_details) == "string"){
 					$data['server_reply'] = "<div class='alert alert-danger'><i class='fa fa-warning'></i>".$user_details."</div>";
 					$this->load->view('admin/login',$data);
 				}else{

 					$session_data = array(
 						             'user_email'=>$this->input->post('admin_email'),
 						             'user_name'=>$user_details['first_name']." ".$user_details['last_name']
 						             );
 					$this->session->set_userdata($session_data);

 					 $this->admin_dashboard();

 				}


 			}else{
 				//Show errors to the user
 				$data['server_reply'] = "<div class='alert alert-warning'>".validation_errors()."</div>";

 				$this->load->view('admin/login',$data);

 			}


 		}
 	}


 	 	public function admin_dashboard(){
 		if(null == $this->session->userdata('user_email')){
 			
 			$this->index();

 		}
 		else{

 			$data['clients'] = $this->Adminmodel->get_count_clients();
 			$data['count_legal_documents'] = count($this->Adminmodel->get_all_legal_documents());
 			$data['clients'] = $this->Adminmodel->get_count_clients();
 			$data['page'] = 'dashboard.php';
 			$data['active_page'] = "Dashboard";
 			$this->load->view('admin/index.php',$data);
 			

 		}
 	}

 	public function logout(){
 		if(!null == $this->session->userdata('user_email')){
 			//$this->session->session_destroy();
 			unset($_SESSION['user_email']);
 			unset($_SESSION['user_name']);

 			$this->index();
 		}else{

 			$this->admin_dashboard();

 			
 			//$this->session->sess_destroy();
 		}

 	}

 	public function calendar(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			
	   		$data_to_view['page'] = "calendar.php";
	   		$data_to_view['active_page'] = "calendar";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function manage_matters(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$data_to_view['matters'] = $this->Adminmodel->get_all_matters();	   
	   		$data_to_view['page'] = "manage_matters.php";
	   		$data_to_view['active_page'] = "Open Cases/Matters";
	   		$data_to_view['page_title'] = "Open Cases/Matters";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 		public function open_cases(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$case_status="open";

 			$data_to_view['matters'] = $this->Adminmodel->get_open_cases($case_status);	   
	   		$data_to_view['page'] = "open_cases.php";
	   		$data_to_view['active_page'] = "Open Cases/Matters";
	   		$data_to_view['page_title'] = "Open Cases/Matters";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function pending_cases(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$case_status="pending";

 			$data_to_view['matters'] = $this->Adminmodel->get_pending_cases($case_status);	   
	   		$data_to_view['page'] = "pending_cases.php";
	   		$data_to_view['active_page'] = "Pending Cases/Matters";
	   		$data_to_view['page_title'] = "Pending Cases/Matters";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function closed_cases(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$case_status="closed";

 			$data_to_view['matters'] = $this->Adminmodel->get_closed_cases($case_status);	   
	   		$data_to_view['page'] = "closed_cases.php";
	   		$data_to_view['active_page'] = "Open Cases/Matters";
	   		$data_to_view['page_title'] = "Open Cases/Matters";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}


 	public function case_file($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			/*$data_to_view['matters'] = $this->Main_model->get_all_matters();*/
 			$data_to_view['matters'] = $this->Adminmodel->get_matter_details($matter_id);
 			$data_to_view['matter_details'] = $this->Adminmodel->get_matter_more_details($matter_id);	   
	   		$data_to_view['page'] = "case_file.php";
	   		$data_to_view['active_page'] = "Case File";
	   		$data_to_view['page_title'] = "Case File";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}

 	public function submit_new_casematter(){
	 			if(null == $this->session->userdata('user_email')){
	 			$this->index();
	 		}else{
	 			if(!isset($_POST)){
	 				$this->add_new_matter();

	 			}else{

 				// validate inputs
	 				
 					
 				$this->form_validation->set_rules('matter_category', 'Matter Category','required|trim');
 				$this->form_validation->set_rules('matter_subcategory', 'Matter Subcategory','required');
 				$this->form_validation->set_rules('matter_name', 'Matter Name','required|max_length[50]|min_length[5]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('incident_date', 'Incident Date','required');
 				$this->form_validation->set_rules('date_created', 'Date Created','required');
 				$this->form_validation->set_rules('case_location', 'Case Location','required');
 				$this->form_validation->set_rules('matter_description', 'Matter Description','required|max_length[5000]|min_length[50]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('matter_status', 'Matter Status','required|trim');
 				$this->form_validation->set_rules('billable', 'Case Billable','required|trim');
 				$this->form_validation->set_rules('client_id', 'Client ID','required|trim');
 				$this->form_validation->set_rules('urgency', 'Case Urgency','required|trim');


 				


 				if(!$this->form_validation->run()){
 					echo "Error validating";

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 		

 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."Error" ."</div>";
 					$data_for_view['page'] = 'add_new_matter.php';
 					$data_for_view['active_page'] = "Add New Case";
 			        $this->load->view('admin/index.php',$data_for_view);

 			        return;

 				}
 				else{
 					
 					$matter_category_id = $this->input->post('matter_category');
 					$attorney = $this->Adminmodel->assign_attorney($matter_category_id);
 					$attorney_id = $attorney['attorney_id'];
 					
 					

 		
 					$data_for_model = array(
	                  'matter_category_id'=>$this->input->post('matter_category'),
	                  'matter_subcategory_id'=>$this->input->post('matter_subcategory'),
	                  'matter_name'=>$this->input->post('matter_name'),
	                  'date_created'=>$this->input->post('date_created'),
	                  'date_of_incident'=>$this->input->post('incident_date'),
	                  'location_of_incident'=>$this->input->post('case_location'),
	                  'matter_status'=>$this->input->post('matter_status'),
	                  'billable'=>$this->input->post('billable'),
	                  'matter_description'=>$this->input->post('matter_description'),
	                  'client_id'=>$this->input->post('client_id'),
	                  'attorney_id'=>$attorney_id,
	                  'urgency'=>$this->input->post('urgency')
	                  
	               
			         );


                   $this->Adminmodel->add_new_case($data_for_model);

                   $this->admin_dashboard();


 				}


 			}

 				
 		}
 	}


 	public function _assign_case($matter_category_id =""){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
  
 			//$info['attorney_details'] = $this->Adminmodel->get_attorney_details();
 			$info['attorney'] = $this->Adminmodel->assign_attorney($matter_category_id);	

 			 return;
 
 		}
 	}

 	

 	public function manage_staff(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			//$data['categories'] = $this->Adminmodel->get_document_categories();
 			$data['page'] = 'manage_staff.php';
 			$data['active_page'] = "Manage Staff";
 			$this->load->view('admin/index.php',$data);
 		}

 	}

 	public function manage_clients(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$info['clients'] = $this->Adminmodel->get_all_clients();
 			$info['page_title'] = "Manage Clients";	   
	   		$info['page'] = "manage_clients.php";
	   		$info['active_page'] = "Manage Clients";
	   		$this->load->view('admin/index.php',$info);
 		}

 	}

 	

 	 public function add_new_client(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			$value['page_title'] = 'Add New Client';
 			$value['page'] = 'add_new_client.php';
 			$value['active_page'] = "Add New Client";
 			$this->load->view('admin/index.php',$value);
 		}
 	}

 	
 	public function submit_new_client(){
	 			if(null == $this->session->userdata('user_email')){
	 			$this->index();
	 		}else{
	 			if(!isset($_POST)){
	 				$this->add_new_client();

	 			}else{

 				// validate inputs
	 				
 					
 				$this->form_validation->set_rules('client_type', 'Client Type','required|trim');
 				$this->form_validation->set_rules('client_first_name', 'Client FirstName','required|max_length[50]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_last_name', 'Client LastName','required|max_length[500]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_location', 'Client NearestTown','required|max_length[500]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_phone', 'Client Phone','required|max_length[15]|min_length[8]|trim');
 				$this->form_validation->set_rules('client_email', 'Client Email','required|max_length[500]|trim');
 				$this->form_validation->set_rules('client_description', 'Client Description','required|max_length[5000]|min_length[100]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_county', 'Client County','required|trim');
 				


 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'add_new_client.php';
 					$data_for_view['page_title'] = "Manage Clients";
 			        $this->load->view('admin/index.php',$data_for_view);

 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					$date = date("Y-m-d",time());

 		
 					$data_for_model = array(
	                  'client_type'=>$this->input->post('client_type'),
	                  'client_firstName'=>$this->input->post('client_first_name'),
	                  'client_lastName'=>$this->input->post('client_last_name'),
	                  'client_countyName'=>$this->input->post('client_county'),
	                  'client_location'=>$this->input->post('client_location'),
	                  'client_email'=>$this->input->post('client_email'),
	                  'client_phone'=>$this->input->post('client_phone'),
	                  'client_description'=>$this->input->post('client_description'),
	                  'date_added'=>$date
	               
			         );


                   $this->Adminmodel->add_client($data_for_model);

                   $this->manage_clients();


 				}


 			}

 				
 		}
 	}
 	
 	public function edit_client($client_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$data_to_view['page'] = "edit_client.php";
	   		$data_to_view['client_details'] = $this->Adminmodel->get_client_details($client_id);
	   		$data_to_view['client_id'] = $client_id;
	   		$data_to_view['active_page'] = "Edit Client";
	   		$data_to_view['page_title'] = "Edit Client";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function submit_edited_client(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			    $this->form_validation->set_rules('client_type', 'Client Type','required|trim');
 				$this->form_validation->set_rules('client_first_name', 'Client FirstName','required|max_length[50]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_last_name', 'Client LastName','required|max_length[500]|min_length[2]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_location', 'Client NearestTown','required|max_length[500]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_phone', 'Client Phone','required|max_length[15]|min_length[8]|trim');
 				$this->form_validation->set_rules('client_email', 'Client Email','required|max_length[50]|trim');
 				$this->form_validation->set_rules('client_description', 'Client Description','required|max_length[5000]|min_length[100]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('client_county', 'Client County','required|trim');

 				$client_id = $this->input->post('client_id');
 				echo $client_id;
 				echo "Hello";
 				

 				

 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'edit_client.php';
 					$data_for_view['page_title'] = "Edit Client";
 			        $this->load->view('admin/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
	                  'client_type'=>$this->input->post('client_type'),
	                  'client_firstName'=>$this->input->post('client_first_name'),
	                  'client_lastName'=>$this->input->post('client_last_name'),
	                  'client_countyName'=>$this->input->post('client_county'),
	                  'client_location'=>$this->input->post('client_location'),
	                  'client_email'=>$this->input->post('client_email'),
	                  'client_phone'=>$this->input->post('client_phone'),
	                  'client_description'=>$this->input->post('client_description')
	           
	               
			         );


                   $this->Adminmodel->update_client($client_id,$data_to_model);

                   $this->manage_clients();


 				}
 			
 		}

 	}



 	public function delete_client($client_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_client($client_id);
 			$this->session->set_flashdata('message', 'Salary successfully deleted!');
 			$this->manage_clients();
 		}

 	}
 	public function get_legal_document_subcategories($legal_document_cat_id){

				
 			      	$this->Adminmodel->legal_document_cat_id = $legal_document_cat_id;
					$legal_document_subcategories = $this->Adminmodel->get_legaldocssubcategories_by_category();
					header('Content-Type: application/x-json; charset=utf-8');
			      	echo json_encode($legal_document_subcategories);

				
			}



 	public function add_new_legal_document(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$value['categories'] = $this->Adminmodel->get_document_categories();
 			$value['page_title'] = 'Add New Legal Document';
 			$value['page'] = 'add_new_legal_document.php';
 			$value['active_page'] = "Manage Legal Documents";
 			$this->load->view('admin/index.php',$value);
 		}
 	}
 	
 	/*public function manage_documents(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			//$data['categories'] = $this->Adminmodel->get_document_categories();
 			$data['documents'] = $this->Adminmodel->get_all_documents();
 			$data['page_title'] = 'List of Legal Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}
*/
 	public function laws(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 1;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}
 	public function lawsuits(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 2;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}
 	
 	

 		public function contracts(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 3;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}

 	public function real_estate(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 4;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}

 	public function estate_planning(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 5;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}

 	public function forms(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$category = 10;
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('admin/index.php',$data);
 		}

 	}


 	
 	public function delete_legal_document($legal_document_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_legal_document($legal_document_id);
 			$this->manage_documents();
 		}

 	}

 	public function edit_legal_document($legal_document_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			$value['categories'] = $this->Adminmodel->get_document_categories();
 			$value['page'] = "edit_legal_document.php";
 			$value['document_id'] = $legal_document_id;
	   		$value['document_details'] = $this->Adminmodel->get_document_details($legal_document_id);
	   		$value['document_categoryname'] = $this->Adminmodel->get_document_categoryname($legal_document_id);
	   		$value['active_page'] = "Edit Legal Document";
	   		$value['page_title'] = "Edit Legal Document";
	   		$this->load->view('admin/index.php',$value);
 		}

 	}


 	public function add_new_matter(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$data['page_title']="Add new Matter";
 			$data['matter_category'] = $this->Adminmodel->get_matter_categories();
 			$data['clients'] = $this->Adminmodel->get_clients();
 			//$data['matter_category'] = $this->Adminmodel->get_matter_categories();
 			//$data['matter_subcategory'] = $this->Adminmodel->get_matter_subcategories();
 			$data['page'] = 'add_new_matter.php';
 			$data['active_page'] = "Manage Matters";
 			$this->load->view('admin/index.php',$data);
 		}
 	}
 	
 	public function delete_case($matter_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			$this->Adminmodel->delete_case($matter_id);
 			$this->open_cases();
 			
 			/*$data['page'] = 'open_cases.php';
 			$data['active_page'] = "Open Cases";
 			$this->load->view('admin/index.php',$data);*/
 		}
 	}


     


	public function get_matter_subcategories($matter_category_id){

					if(null == $this->session->userdata('user_email')){
 			      $this->index();
 			      }else{

 			      	$this->Adminmodel->matter_category_id = $matter_category_id;
					$sub_categories = $this->Adminmodel->get_subcategories_by_category();

					header('Content-Type: application/x-json; charset=utf-8');
			      	echo json_encode($sub_categories);


				}
			}


	public function submit_new_legal_document(){
	 			if(null == $this->session->userdata('user_email')){
	 			$this->index();
	 		}else{
	 			if(!isset($_POST)){
	 				$this->add_new_legal_document();

	 			}else{



	 				$document_upload_path = "./assets/Documents/LegalDocuments/";

	 				$allowed_types = 'pdf|doc|docx'; 

	 				$datareturned = $this->upload_file("documentfile",$document_upload_path,$allowed_types);


	 				
	 				if(isset($datareturned['error'])){

	 					
	 				$data_to_view['server_reply_file'] = "<div class='alert alert-danger'>".$datareturned['error']."</div>";
	 				$data_to_view['categories'] = $this->Adminmodel->get_document_categories(); 			
 					$data_to_view['page'] = 'add_new_legal_document.php';
 					$data_to_view['active_page'] = "Manage Docs";
 					$data_to_view['page_title'] = "Manage Docs";
 					
 			        $this->load->view('admin/index.php',$data_to_view); 			        
 			        return;


 				}else{


 				// validate other inputs


	 				
 					
 				$this->form_validation->set_rules('legal_document_name', 'Document Title','required|trim');
 				$this->form_validation->set_rules('legal_document_description', 'Document Description','required|max_length[5000]|trim');

 				
 				if(!$this->form_validation->run()){

 					$data_to_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['page'] = 'add_new_legal_document.php';
 					$data_to_view['active_page'] = "Manage Docs";
 			        $this->load->view('admin/index.php',$data_to_view);


 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					$date = date("Y-m-d h:i:s");

 					$data_to_model = array(
	                  'legal_document_name'=>$this->input->post('legal_document_name'),
	                  'legal_document_description'=>$this->input->post('legal_document_description'),
	                  'legal_document_cat_id'=>$this->input->post('document_category'),
	                  'legal_documents_sub_categories_id'=>$this->input->post('legal_document_subcategory'),
	                  'document_full_path'=>$datareturned['upload_data']['file_name'],
	                  'file_type'=>$datareturned['upload_data']['file_ext'],
	                  'date_added'=>$date
	               
			         );


                  $this->Adminmodel->add_legal_document($data_to_model);
                   //$insert_legal_document = $this->db->insert('legal_documents',$data_to_model);

                   $this->laws();


 				}


 			}

 				
 		}
 			
 	  }
 	}

 	public function upload_file($field_name = "", $upload_folder,$allowed_types){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$config['upload_path'] = $upload_folder;
 			$config['allowed_types']= $allowed_types;
 			$config['max_size'] = 10000;

 			$this->upload->initialize($config);


 			if(!$this->upload->do_upload($field_name)){

 			  $error = array('error' => $this->upload->display_errors());

 			  return $error;

 			}else{

 				$data = array('upload_data' => $this->upload->data());

			   return $data;

 			}
 		}
 	}


 	public function new_attorney(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$value['speciality'] = $this->Adminmodel->get_attorney_specialities();
 			
 			$value['page_title'] = 'Add new attorney';
 			$value['page'] = 'new_attorney.php';
 			$value['active_page'] = "Add new attorney";
 			$this->load->view('admin/index.php',$value);
 		}
 	}

 	public function submit_new_attorney(){
	 			if(null == $this->session->userdata('user_email')){
	 			$this->index();
	 		}else{
	 			if(!isset($_POST)){
	 				$this->new_attorney();

	 			}else{

	 				$cv_upload_path = "./assets/Documents/AttorneyCV/";
	 				$id_upload_path = "./assets/Documents/AttorneyID/";

	 				$cv_allowed_types = 'pdf|doc|docx'; 
	 				$id_allowed_types = 'jpg|jpeg|png';

	 				$datareturned_cv = $this->upload_cv("attorney_cv",$cv_upload_path,$cv_allowed_types);
	 				$datareturned_id = $this->upload_scanned_id("scannned_id",$id_upload_path,$id_allowed_types);

	 				if(isset($datareturned_cv['error'])){
	 					if(isset($datareturned_id['error'])){
	 					
	 				$data_to_view['server_reply_file'] = "<div class='alert alert-danger'>".$datareturned_id['error']."</div>";

	 				$data_to_view['server_reply_file'] = "<div class='alert alert-danger'>".$datareturned_cv['error']."</div>";

	 				$data_to_view['page_title'] = 'New Attorney';
	 				$data_for_view['speciality'] = $this->Adminmodel->get_attorney_specialities();
 					$data_to_view['page'] = 'new_attorney.php';
 					$data_to_view['active_page'] = "Add new attorney";
 			        $this->load->view('admin/index.php',$data_to_view);

 			        return;

 			    }

 			    }else{

 
 				$this->form_validation->set_rules('attorney_first_name', 'Attorney FirstName','required|max_length[50]|min_length[3]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_last_name', 'Attorney LastName','required|max_length[50]|min_length[3]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_speciality', 'Attorney Speciality','required|max_length[50]|min_length[1]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				$this->form_validation->set_rules('attorney_phone', 'Attorney Phone','required|max_length[15]|min_length[8]|trim');

 				$this->form_validation->set_rules('attorney_email', 'Attorney Email','required|max_length[50]|trim');
 				$this->form_validation->set_rules('attorney_password', 'Password','required|max_length[50]|trim');

 				$this->form_validation->set_rules('attorney_notes', 'Attorney notes','required|max_length[5000]|min_length[20]|trim',
 					array('required' => 'You must provide a %s.')
 					);
 				
 				


 				if(!$this->form_validation->run()){

 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'new_attorney.php';

 					$data_for_view['active_page'] = "Add New Attorney";
 					$data_for_view['page_title'] = "Add New Attorney";
 					$data_for_view['speciality'] = $this->Adminmodel->get_attorney_specialities();
 			        $this->load->view('admin/index.php',$data_for_view);

 			        return;

 				}
 				else{
 					

 		
 					$data_for_model = array(
	                  'attorney_first_name'=>$this->input->post('attorney_first_name'),
	                  'attorney_last_name'=>$this->input->post('attorney_last_name'),
	                  'matter_category_id'=>$this->input->post('attorney_speciality'),
	                  'attorney_phone'=>$this->input->post('attorney_phone'),
	                  'attorney_email'=>$this->input->post('attorney_email'),
	                  'attorney_password'=>$this->input->post('attorney_password'),
	                  'employment_status'=>$this->input->post('employment_status'),
	                  'employmentDate'=>$this->input->post('employmentDate'),
	                  'nssfNo'=>$this->input->post('nssfNo'),
	                  'nhifNo'=>$this->input->post('nhifNo'),
	                  'attorney_notes'=>$this->input->post('attorney_notes'),
	                  'cv_full_path'=>$datareturned_cv['upload_data_cv']['file_name'],
	                  'file_type'=>$datareturned_cv['upload_data_cv']['file_ext']
	                  //'id_full_path'=>$datareturned_id['upload_data']['file_name'],
	                  //'id_file_type'=>$datareturned_id['upload_data']['file_ext'],
			         );


                   $this->Adminmodel->add_attorney($data_for_model);

                   $this->manage_attorneys();


 				}

 				}


 			}

 				
 		}
 	}


 	public function upload_cv($field_name = "", $cv_upload_path,$cv_allowed_types){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$config['upload_path'] = $cv_upload_path;
 			$config['allowed_types']= $cv_allowed_types;
 			$config['max_size'] = 5000;

 			$this->upload->initialize($config);


 			if(!$this->upload->do_upload($field_name)){

 			  $error = array('error' => $this->upload->display_errors());

 			  return $error;

 			}else{

 				$data = array('upload_data_cv' => $this->upload->data());

			   return $data;

 			}
 		}
 	}

 	public function upload_scanned_id($field_name = "", $upload_folder,$id_allowed_types){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$config['upload_path'] = $upload_folder;
 			$config['id_allowed_types']= $id_allowed_types;
 			$config['max_size'] = 5000;

 			$this->upload->initialize($config);


 			if(!$this->upload->do_upload($field_name)){

 			  $error = array('error' => $this->upload->display_errors());

 			  return $error;

 			}else{

 				$data = array('upload_data' => $this->upload->data());

			   return $data;

 			}
 		}
 	}
 	


 	public function manage_attorneys(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$info['attorneys'] = $this->Adminmodel->get_all_attorneys();
 			$info['page_title'] = "Manage Attorneys";	   
	   		$info['page'] = "manage_attorneys.php";
	   		$info['active_page'] = "Manage Attorneys";
	   		$this->load->view('admin/index.php',$info);
 		}

 	}
 	
 	public function delete_attorney($attorney_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			$this->Adminmodel->delete_attorney($attorney_id);
 			$this->manage_attorneys();
 			
 			
 		}
 	}


 	public function edit_attorney($attorney_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

  
	   		$data_to_view['page'] = "edit_attorney.php";
	   		$data_to_view['attorney_details'] = $this->Adminmodel->get_attorney_details($attorney_id);
	   		$data_to_view['attorney_id'] = $attorney_id;
	   		$data_to_view['active_page'] = "Edit Attorney";
	   		$data_to_view['page_title'] = "Edit Attorney";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}
 	
 	
 	 	public function submit_edited_attorney(){
 		if(null == $this->session->userdata('user_email')){
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
 				echo $attorney_id;
 				echo "Hello";
 				

 				

 				if(!$this->form_validation->run()){

 					//$data_for_view['categories'] = $this->Adminmodel->get_document_categories();
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'edit_client.php';
 					$data_for_view['page_title'] = "Edit Client";
 			        $this->load->view('admin/index.php',$data_for_view);


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


                   $this->Adminmodel->update_attorney($attorney_id,$data_to_model);

                   $this->manage_attorneys();


 				}
 			
 		}

 	}



}
