<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
 		$this->load->model('Main_model');
 		$this->load->model('Adminmodel');
 		
 		
 		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
 	}


 		public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('main/login');
	}
	

 	public function staff_login(){
 		if(null == $this->input->post('attorney_email') && null == $this->input->post('staff_password')){
 			$this->index();
 		}else{


 			$this->form_validation->set_rules('staff_email','Email','required|trim');
 			$this->form_validation->set_rules('staff_password','Password','required|trim');
 			//$password = md5($this->$this->input->post('staff_password'));
 			$password = do_hash($this->input->post('staff_password'),'md5');


 			if($this->form_validation->run()){
 				//compare values with those in the db
 				$attorney_credentials = array(
 					                    'staff_email'=> $this->input->post('staff_email'),
 					                     'staff_password'=>$password
 					                     );


 				$attorney_details = $this->Main_model->check_login_credentials($attorney_credentials);


 				if(gettype($attorney_details) == "string"){
 					$data['server_reply'] = "<div class='alert alert-danger'><i class='fa fa-warning'></i>".$attorney_details."</div>";
 					$this->load->view('main/login',$data);
 				}else{

 					$attorney_session_data = array(
 						             'attorney_email'=>$this->input->post('staff_email'),
 						             'attorney_id'=>$attorney_details['attorney_id'],
 						             'attorney_name'=>$attorney_details['attorney_first_name']." ".$attorney_details['attorney_last_name']
 						             );
 					
 					$this->session->set_userdata($attorney_session_data);

 					

 					 $this->staff_dashboard();

 				}


 			}else{
 				//Show errors to the user
 				$data['server_reply'] = "<div class='alert alert-warning'>".validation_errors()."</div>";

 				$this->load->view('main/login',$data);
 				echo "error";

 			}


 		}
 	}

 	public function logout(){
 		if(!null == $this->session->userdata('attorney_email')){
 			//$this->session->session_destroy();
 			unset($_SESSION['staff_email']);
 			unset($_SESSION['user_name']);

 			$this->index();
 		}else{

 			$this->staff_dashboard();

 			
 			//$this->session->sess_destroy();
 		}

 	}



 	public function staff_dashboard()
	{
		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

		$data_to_view['page'] = "attorney_dashboard.php";
		$data_to_view['count_legal_documents'] = count($this->Adminmodel->get_all_legal_documents());
		$data_to_view['page_title'] = "Attorney Dashboard";
	   	$data_to_view['active_page'] = "Home";
	   	$this->load->view('main/index.php',$data_to_view);
	   

	   }//end else


	//$this->load->view('home');
	}

 	public function staff_register(){
 		if(null == $this->input->post('attorney_email') && null == $this->input->post('staff_password')){
 			
 			$this->load->view('main/register.php');
 		}else{

 			//$data['categories'] = $this->staffmodel->get_document_categories();
 			//$data['page'] = 'register.php';
 			//$data['active_page'] = "Register";
 			$this->index();
 		}

 	}

 	public function edit_profile(){
 		/*if(null == $this->session->staffdata('user_email')){
 			$this->index();
 		}else{*/
 			//$data['categories'] = $this->staffmodel->get_document_categories();
 			$data['page'] = 'edit_profile.php';
 			$data['active_page'] = "Edit Profile";
 			$this->load->view('main/index.php',$data);
 		//}

 	}

 	public function calendar(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			
	   		$data_to_view['page'] = "calendar.php";
	   		$data_to_view['page_title'] = "My Calendar";
	   		$data_to_view['active_page'] = "calendar";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}


 	public function manage_matters(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$data_to_view['matters'] = $this->Main_model->get_all_matters();	   
	   		$data_to_view['page'] = "assigned_matters.php";
	   		$data_to_view['active_page'] = "Open Cases/Matters";
	   		$data_to_view['page_title'] = "Open Cases/Matters";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}

 	

 	public function add_new_matter(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
 			$data['page_title']="Add new Matter";
 			$data['matter_category'] = $this->Main_model->get_matter_categories();
 			$data['clients'] = $this->Main_model->get_clients();
 			$data['page'] = 'add_new_matter.php';
 			$data['active_page'] = "Manage Matters";
 			$this->load->view('main/index.php',$data);
 		}
 	}

 	public function get_matter_subcategories($matter_category_id){

					if(null == $this->session->userdata('user_email')){
 			      $this->index();
 			      }else{

 			      	$this->Main_model->matter_category_id = $matter_category_id;
					$sub_categories = $this->Main_model->get_subcategories_by_category();

					header('Content-Type: application/x-json; charset=utf-8');
			      	echo json_encode($sub_categories);

				}
			}


public function assigned_open(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$status = "Open";
 			$attorney_id = $this->session->userdata('attorney_id');
 			$data_to_view['matters'] = $this->Main_model->get_assigned_matters($status, $attorney_id);	   
	   		$data_to_view['page'] = "assigned_matters.php";
	   		$data_to_view['active_page'] = "Assigned Open cases";
	   		$data_to_view['page_title'] = "Assigned Open cases";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}




 	public function assigned_pending(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$status = "Pending";

 			$attorney_id = $this->session->userdata('attorney_id');
 			$data_to_view['matters'] = $this->Main_model->get_assigned_matters($status, $attorney_id);	   
	   		$data_to_view['page'] = "assigned_matters.php";
	   		$data_to_view['active_page'] = "Assigned Open cases";
	   		$data_to_view['page_title'] = "Assigned Open cases";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}

 	public function assigned_closed(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$status = "Closed";

 			$attorney_id = $this->session->userdata('attorney_id');
 			$data_to_view['matters'] = $this->Main_model->get_assigned_matters($status, $attorney_id);	   
	   		$data_to_view['page'] = "assigned_matters.php";
	   		$data_to_view['active_page'] = "Assigned Open cases";
	   		$data_to_view['page_title'] = "Assigned Open cases";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}


 	public function case_file($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			/*$data_to_view['matters'] = $this->Main_model->get_all_matters();*/
 			$data_to_view['matter_assigned'] = $this->Main_model->get_matter_details($matter_id);
 			$data_to_view['similar_cases'] = $this->Main_model->get_similar_cases($matter_id);
 			$data_to_view['file'] = $this->Main_model->get_matter_more_details($matter_id);   
 			$data_to_view['case_document'] = $this->Main_model->get_caseFile_documents($matter_id);  
	   		$data_to_view['page'] = "case_file.php";
	   		$data_to_view['active_page'] = "Case File";
	   		$data_to_view['page_title'] = "Case File";
	   		$this->load->view('main/index.php',$data_to_view);
 		}


 	}



 	public function previous_case_file($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			/*$data_to_view['matters'] = $this->Main_model->get_all_matters();*/
 			$data_to_view['matter_assigned'] = $this->Main_model->get_matter_details($matter_id);
 			$data_to_view['similar_cases'] = $this->Main_model->get_similar_cases($matter_id);
 			$data_to_view['file'] = $this->Main_model->get_matter_more_details($matter_id);   
 			$data_to_view['case_document'] = $this->Main_model->get_caseFile_documents($matter_id);  
	   		$data_to_view['page'] = "case_file.php";
	   		$data_to_view['active_page'] = "Case File";
	   		$data_to_view['page_title'] = "Case File";
	   		$this->load->view('main/index.php',$data_to_view);

 		}
  

 	}
 	
 	
 	public function add_case_document($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
	   		$data_to_view['page'] = "add_case_document.php";
	   		$data_to_view['matter_id'] = $matter_id;
	   		$data_to_view['active_page'] = "Add Case file Document";
	   		$data_to_view['page_title'] = "Add Case file Document";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}
 	
 	public function submit_caseFile_document(){
	 			if(null == $this->session->userdata('attorney_email')){
	 			$this->index();
	 		}else{
	 			if(!isset($_POST)){
	 				$this->index();

	 			}else{
	 				

	 				$document_upload_path = "./assets/Documents/CaseFile_Documents/";

	 				$allowed_types = 'pdf|doc|docx'; 

	 				$datareturned = $this->upload_file("documentfile",$document_upload_path,$allowed_types);
	 								
	 				
	 				
	 				if(isset($datareturned['error'])){
	 					
	 				$data_to_view['server_reply_file'] = "<div class='alert alert-danger'>".$datareturned['error']."</div>";

 					$data_to_view['page'] = 'add_case_document.php';
 					$data_to_view['active_page'] = "Add Case file Document";
 					$data_to_view['page_title'] = "Add Case file Document";
 			        $this->load->view('main/index.php',$data_to_view);
 			        
 			        
 			        return;


 				}else{

 				// validate other inputs
 					
 				$this->form_validation->set_rules('caseFile_document_name', 'Case File Document Title','required|trim');
 				$this->form_validation->set_rules('caseFile_document_description', 'Document Description','required|max_length[5000]|trim');

 				$matter_id = $this->input->post('matter_id');			

 				if(!$this->form_validation->run()){

 					$data_to_view['categories'] = $this->Main_model->get_document_categories();
 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['page'] = 'add_case_document.php';
 					$data_to_view['active_page'] = "Add Case file Document";
 					$data_to_view['page_title'] = "Add Case file Document";
 			        $this->load->view('main/index.php',$data_to_view);

 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					$date = date("Y-m-d",time());

 		
 					$data_to_model = array(
 					  'matter_id'=>$matter_id,
	                  'caseFile_document_name'=>$this->input->post('caseFile_document_name'),
	                  'caseFile_document_description'=>$this->input->post('caseFile_document_description'),
	                  'document_full_path'=>$datareturned['upload_data']['file_name'],
	                  'file_type'=>$datareturned['upload_data']['file_ext'],
	                  'date_added'=>$date
			         );

                   $this->Main_model->add_caseFile_document($data_to_model);

                   $this->case_file($matter_id);


 				}


 			}

 				
 		}
 			
 	  }
 	}


 	public function case_notes($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{	
	   		$data_to_view['page'] = "add_case_notes.php";
	   		$data_to_view['matter_id'] = $matter_id;
	   		$data_to_view['active_page'] = "Case File";
	   		$data_to_view['page_title'] = "Add Case Notes";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}

 	public function load_case_notes_edit($matter_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{	
 			   
	   		$data_to_view['page'] = "edit_case_notes.php";
	   		$data_to_view['case_notes'] = $this->Main_model->get_matter_more_details($matter_id);
	   		$data_to_view['matter_id'] = $matter_id;
	   		$data_to_view['active_page'] = "Edit Case Notes";
	   		$data_to_view['page_title'] = "Edit Case Notes";
	   		$this->load->view('main/index.php',$data_to_view);
 		}

 	}
 	
 	public function add_case_notes(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			
 			//$data_to_view['matters'] = $this->Main_model->get_matter_details($matter_id);
 			$data_to_model = array(
	                  'case_notes'=>$this->input->post('case_notes'),
	                  'matter_id'=>$this->input->post('matter_id')
	               
			         );

 			$this->Main_model->add_case_notes($data_to_model);	
 			$this->open_cases();   
	   		
 		}

 	}

 	public function update_matter_notes(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
 			$matter_id = $this->input->post('matter_id');

 			
 			//$data_to_view['matters'] = $this->Main_model->get_matter_details($matter_id);
 			$data_to_model = array(
	                  'case_notes'=>$this->input->post('case_notes'),
	                  'matter_id'=>$this->input->post('matter_id')
	               
			         );

 			$this->Main_model->update_matter_notes($data_to_model);	
 			$this->case_file($matter_id); 
	   		
 		}

 	}

public function laws(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = 1;
 			$name = "Laws";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $name;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}
 	public function lawsuits(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = 2;
 			$name = "Law Suits";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $name;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}
 	
 	

 		public function contracts(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = 3;
 			$name = "Contracts";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $name;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}

 	public function real_estate(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = 4;
 			$name = "Real Estate";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $name;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}

 	public function estate_planning(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = 5;
 			$name = "Estate Planning";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $name;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}

 	public function forms(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$category = "Forms";
 			
 			$data['documents'] = $this->Adminmodel->get_legal_by_cat_documents($category);
 			$data['name'] = $category;
 			$data['page_title'] = 'List of Documents';
 			$data['page'] = 'manage_documents.php';
 			$data['active_page'] = "Manage Documents";
 			$this->load->view('main/index.php',$data);
 		}

 	}

 	public function get_legal_document_subcategories($legal_document_cat_id){

				
 			      	$this->Main_model->legal_document_cat_id = $legal_document_cat_id;
					$legal_document_subcategories = $this->Main_model->get_legaldocssubcategories_by_category();
					header('Content-Type: application/x-json; charset=utf-8');
			      	echo json_encode($legal_document_subcategories);

				
			}

public function add_new_legal_document(){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
 			$value['categories'] = $this->Main_model->get_document_categories();
 			//$data['matter_category'] = $this->Main_model->get_matter_categories();
 			//$data['matter_subcategory'] = $this->Main_model->get_matter_subcategories();
 			$value['page_title'] = 'Add New Legal Document';
 			$value['page'] = 'add_new_legal_document.php';
 			$value['active_page'] = "Manage Legal Documents";
 			$this->load->view('main/index.php',$value);
 		}
 	}
public function submit_new_legal_document(){
	 			if(null == $this->session->userdata('attorney_email')){
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


	 				$data_to_view['categories'] = $this->Main_model->get_document_categories(); 			
 					$data_to_view['page'] = 'add_new_legal_document.php';
 					$data_to_view['active_page'] = "Manage Docs";
 			        $this->load->view('main/index.php',$data_to_view);
 			        
 			        
 			        return;


 				}else{

 				// validate other inputs
 					
 				$this->form_validation->set_rules('legal_document_name', 'Document Title','required|trim');
 				$this->form_validation->set_rules('legal_document_description', 'Document Description','required|max_length[500]|trim');
 				//$this->form_validation->set_rules('document_category', 'Document Category','required|callback_category_select_okey|trim');
 				


 				if(!$this->form_validation->run()){

 					$data_to_view['categories'] = $this->Main_model->get_document_categories();
 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['page'] = 'add_new_legal_document.php';
 					$data_to_view['active_page'] = "Manage Docs";
 			        $this->load->view('main/index.php',$data_to_view);

 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					$date = date("Y-m-d",time());

 		
 					$data_to_model = array(
	                  'legal_document_name'=>$this->input->post('legal_document_name'),
	                  'legal_document_description'=>$this->input->post('legal_document_description'),
	                  'legal_document_cat_id'=>$this->input->post('document_category'),
	                  'document_full_path'=>$datareturned['upload_data']['file_name'],
	                  'file_type'=>$datareturned['upload_data']['file_ext'],
	                  'date_added'=>$date
	               
			         );


                   $this->Main_model->add_legal_document($data_to_model);

                   $this->manage_documents();


 				}


 			}

 				
 		}
 			
 	  }
 	}

     public function upload_file($field_name = "", $upload_folder,$allowed_types){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{

 			$config['upload_path'] = $upload_folder;
 			$config['allowed_types']= $allowed_types;
 			$config['max_size'] = 2048;

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

 	public function edit_legal_document($legal_document_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
 			
 			$value['categories'] = $this->Adminmodel->get_document_categories();
 			$value['page'] = "edit_legal_document.php";
 			$value['document_id'] = $legal_document_id;
	   		$value['document_details'] = $this->Adminmodel->get_document_details($legal_document_id);
	   		$value['document_categoryname'] = $this->Adminmodel->get_document_categoryname($legal_document_id);
	   		$value['active_page'] = "Edit Legal Document";
	   		$value['page_title'] = "Edit Legal Document";
	   		$this->load->view('main/index.php',$value);
 		}

 	}

 	public function delete_legal_document($legal_document_id){
 		if(null == $this->session->userdata('attorney_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_legal_document($legal_document_id);
 			$this->manage_documents();
 		}

 	}

 	//To be completed tomorrow......................
 	public function submit_edited_legal_document(){
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





 	public function leave_application(){
 		if(null == $this->session->userdata('attorney_email')){
 			
 			$this->index();

 		}
 		else{


 			$data['page'] = 'leaveform.php';
 			$data['page_title'] = 'Leave Application Form';
 			$data['active_page'] = "Leave Application Form";
 			$this->load->view('main/index.php',$data);
 			

 		}
 	}

 	
 	public function submit_leave_application(){
 		if(null == $this->session->userdata('attorney_email')){
 			
 			$this->index();

 		}
 		else{
 			
 		
 			    $this->form_validation->set_rules('leave_type', 'Leave type','required|trim');
 				$this->form_validation->set_rules('paid_leave', 'Paid Leave','required');
 				$this->form_validation->set_rules('leaveStartDate', 'Leave Start Date','required');
 				$this->form_validation->set_rules('leave_duration', 'Expected leave duration','required');
 				$this->form_validation->set_rules('leave_description', 'Leave Explanation','required|max_length[5000]|min_length[100]|trim',
 					array('required' => 'You must provide a %s.')
 					);

 				if(!$this->form_validation->run()){

 					
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'leaveform.php';
 					$data_for_view['page_title'] = "Add Leave applications";
 			        $this->load->view('main/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
 					  'attorney_id'=> $this->session->userdata('attorney_id'),
	                  'leave_type'=>$this->input->post('leave_type'),
	                  'paid_leave'=>$this->input->post('paid_leave'),
	                  'leaveStartDate'=>$this->input->post('leaveStartDate'),
	                  'leave_duration'=>$this->input->post('leave_duration'),
	                  'leave_description'=>$this->input->post('leave_description')           
	               
			         );


                   $this->Main_model->insert_leave_applications($data_to_model);

                   $this->staff_dashboard();


 				}

 		}
 	}

 	
 	public function advance_application(){
 		if(null == $this->session->userdata('attorney_email')){
 			
 			$this->index();

 		}
 		else{

 			$data['page'] = 'advance_salary.php';
 			$data['page_title'] = 'Advance Salary Application Form';
 			$data['active_page'] = "Advance Salary Application Form";
 			$this->load->view('main/index.php',$data);
 			

 		}
 	}
 	
 	public function submit_advanceSalary_application(){
 		if(null == $this->session->userdata('attorney_email')){
 			
 			$this->index();

 		}
 		else{
 		
 			    $this->form_validation->set_rules('application_reason', 'Reason for Applying Advance','required|trim');
 				$this->form_validation->set_rules('amount', 'Advance salary amount','required');
 				$this->form_validation->set_rules('last_net_salary', 'Leave Start Date','required');
 				$this->form_validation->set_rules('repay_method', 'Repay Method','required');
 				$this->form_validation->set_rules('advance_purpose_description', 'Description of the advance application','required|max_length[5000]|min_length[20]|trim',
 					array('required' => 'You must provide a %s.')
 					);

 				if(!$this->form_validation->run()){

 					
 			
 			        $data_for_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_for_view['page'] = 'advance_salary.php';
 					$data_for_view['page_title'] = "Advance Salary application";
 			        $this->load->view('main/index.php',$data_for_view);


 			        return;

 				}else{
 					
 		
 					$data_to_model = array(
 					  'staff_id'=> $this->session->userdata('staff_id'),
 					   'application_reason'=>$this->input->post('application_reason'),
	                  'amount'=>$this->input->post('amount'),
	                  'last_net_salary'=>$this->input->post('last_net_salary'),
	                  'repay_method'=>$this->input->post('repay_method'),
	                  'advance_purpose_description'=>$this->input->post('advance_purpose_description')
			         );


                   $this->Main_model->insert_advanceSalary_application($data_to_model);

                   $this->staff_dashboard();


 				}

 		}
 	}

	
}
