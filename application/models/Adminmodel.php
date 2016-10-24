<?php

/**
* 
*/
class Adminmodel extends CI_Model
{
	public $matter_category_id = null;
	public $legal_document_cat_id = null;

	function check_login_credentials($admin_credentials){

		$check_admin_exists = $this->db->get_where('admins',array('admin_email'=>$admin_credentials['admin_email'],'admin_password'=>$admin_credentials['admin_password']));

		if($check_admin_exists->num_rows() > 0){

			$data_to_return['first_name'] = $check_admin_exists->row()->first_name;
			$data_to_return['last_name'] = $check_admin_exists->row()->last_name;

		}
		else{

			$data_to_return = "No user with such credentials in our records. Recheck your details";
		}

		return $data_to_return;
	}

	function get_document_categories(){
		$document_categories = $this->db->get('legal_documents_categories');
		
		return $document_categories->result_array();

	}

	function get_document_categoryname($legal_document_id) {

	 if(!is_null($legal_document_id)){

			$this->db->select('*');
			$this->db->from('legal_documents_categories');
			$this->db->where('legal_document_cat_id',$legal_document_id);
			$query = $this->db->get();

			return $query->result_array();

			
	}	

}

	function get_document_details($legal_document_id) {

	 if(!is_null($legal_document_id)){

			$this->db->select('*');
			$this->db->from('legal_documents');
			$this->db->where('legal_document_id',$legal_document_id);
			$query = $this->db->get();

			return $query->result_array();

			
	}	

}

	

	function get_matter_categories() {

		
	 $this ->db->select('matter_category_id, matter_category_name');
	 $query = $this->db-> get('matter_category');

	 return $query->result();
	}


	  function get_subcategories_by_category (){


	        if(!is_null($this->matter_category_id)){
			$this->db->select('matter_subcategory_id, matter_subcategory_name');
			$this->db->where('matter_category_id', $this->matter_category_id);
			$sub_categories = $this->db->get('matter_subcategory');

			// if there are suboptinos for this option...
			if($sub_categories->num_rows() > 0){
				$sub_categories_arr;

				// Format for passing into jQuery loop

				foreach ($sub_categories->result() as $subCat) {
					$sub_categories_arr[$subCat->matter_subcategory_id] = $subCat->matter_subcategory_name;
				}

				return $sub_categories_arr;
			}
		}

		return;
	    } 

	    function add_new_case($data_for_model){

		$insert_new_client = $this->db->insert('matters',$data_for_model);
		
	
	}


	function assign_attorney($matter_category_id){


		$attorneys = $this->db->get_where('attorneys',array('matter_category_id'=>$matter_category_id));
		if($attorneys->num_rows() < 1){
			$data_to_return = 0;
		}else{
			$attorney_data = $attorneys->result_array();
			$all_attorney_cases = array();
			for ($counter=0; $counter < count($attorney_data); $counter++) { 
				$attorney_cases = $this->db->get_where('matters',array('attorney_id'=>$attorney_data[$counter]['attorney_id'],'matter_status' =>'Open'))->num_rows();
				$attorney_data[$counter]['attorney_cases'] = $attorney_cases;
				$all_attorney_cases[$counter] = $attorney_cases;
			}

			sort($all_attorney_cases);

			for ($counter=0; $counter < count($attorney_data); $counter++) { 
				if($attorney_data[$counter]['attorney_cases'] == $all_attorney_cases[0]){
					$data_to_return = $attorney_data[$counter];
				}
			}

		}

		return $data_to_return;


		
	}




	function get_open_cases($case_status){

		 if(!is_null($case_status)){

			$this->db->select('*');
			$this->db->from('matters');
			$this->db->where('matter_status',$case_status);
			$query = $this->db->get();

			/*$matter_details = $this->db->get('matters');

*/
			return $query->result_array();

			
	}
		
	}
	
	function get_pending_cases($case_status){
		if(!is_null($case_status)){

			$this->db->select('*');
			$this->db->from('matters');
			$this->db->where('matter_status',$case_status);
			$query = $this->db->get();

			/*$matter_details = $this->db->get('matters');

*/
			return $query->result_array();

			
	}
	}
	function get_closed_cases($case_status){
		if(!is_null($case_status)){

			$this->db->select('*');
			$this->db->from('matters');
			$this->db->where('matter_status',$case_status);
			$query = $this->db->get();

			/*$matter_details = $this->db->get('matters');

*/
			return $query->result_array();

			
	}
	}
	
	function delete_case($matter_id){
		if(!is_null($matter_id)){

			$this->db->where('matter_id', $matter_id);
			$this->db->delete('matters');


			
	}
	}


	function get_legal_by_cat_documents($category){

		$legal_documents_details = $this->db->get_where('legal_documents',array('legal_document_cat_id'=>$category));

		$legal_documents_details = $legal_documents_details->result_array();

		/*print_r($legal_documents_details);
		exit();*/
		

		/*if($legal_documents_details->num_rows() > 0){

			 $legal_documents_details = $legal_documents_details->result_array();
	

		for($counter=0; $counter < count($legal_documents_details); $counter++){
			$document = $this->db->get_where('legal_documents',array('legal_document_id'=>$legal_documents_details[$counter]['legal_document_cat_id']));
			$documents_data = $document->result_array();

			$legal_documents_details[$counter]['legal_document_id'] = $documents_data[0]['legal_document_id'];
			$legal_documents_details[$counter]['legal_document_name'] = $documents_data[0]['legal_document_name'];
			$legal_documents_details[$counter]['legal_document_description'] = $documents_data[0]['legal_document_description'];
			$legal_documents_details[$counter]['legal_document_cat_id'] = $documents_data[0]['legal_document_cat_id'];
			$legal_documents_details[$counter]['legal_documents_sub_categories_id'] = $documents_data[0]['legal_documents_sub_categories_id'];
			$legal_documents_details[$counter]['document_full_path'] = $documents_data[0]['document_full_path'];

		}

		}else{

			echo "error";*/

			
	//}

		return $legal_documents_details;
		
		//return $legal_documents_details->result_array();
	
}

function get_legaldocssubcategories_by_category(){


	        if(!is_null($this->legal_document_cat_id)){
			$this->db->select('legal_documents_sub_categories_id, legal_doucument_sub_cat_name');
			$this->db->where('legal_document_cat_id', $this->legal_document_cat_id);
			$sub_categories = $this->db->get('legal_documents_sub_categories');

			// if there are suboptinos for this option...
			if($sub_categories->num_rows() > 0){
				$sub_categories_arr;

				// Format for passing into jQuery loop

				foreach ($sub_categories->result() as $subCat) {
					$sub_categories_arr[$subCat->legal_documents_sub_categories_id] = $subCat->legal_doucument_sub_cat_name;
				}

				return $sub_categories_arr;
			}
		}

		return;
	    } 



	function add_legal_document($data_to_model){


		$insert_legal_document = $this->db->insert('legal_documents',$data_to_model);
		
	
	}
	
	function delete_legal_document($legal_document_id){
		if(!is_null($legal_document_id)){

			$this->db->where('legal_document_id', $legal_document_id);
			$this->db->delete('legal_documents');

	
	}
	}

	function get_clients() {

		
	 $this ->db->select('client_id, client_firstName,client_lastName');
	 $query = $this->db-> get('clients');

	 return $query->result();
	}
	
	
	function get_client_details($client_id) {

	 if(!is_null($client_id)){

			$this->db->select('*');
			$this->db->from('clients');
			$this->db->where('client_id',$client_id);
			$query = $this->db->get();

			return $query->result_array();

			
	}	

}


	function add_client($data_for_model){

		$insert_new_client = $this->db->insert('clients',$data_for_model);
		
	
	}
	
	function delete_client($client_id){
		if(!is_null($client_id)){

			$this->db->where('client_id', $client_id);
			$this->db->delete('clients');


			
	}
	}

	
	function update_client($client_id,$data_to_model){
		if(!is_null($client_id && $data_to_model)){


			$this->db->where('client_id', $client_id);
			$this->db->update('clients', $data_to_model);




	}
	}

	
	function get_matter_details($matter_id) {

	 if(!is_null($matter_id)){

			$this->db->select('matter_id, matter_subcategory_id, date_created, matter_name,date_created, date_of_incident, location_of_incident,matter_description, matter_status, matter_category_id, billable,client_id, urgency');
			$this->db->from('matters');
			$this->db->where('matter_id',$matter_id);
			$query = $this->db->get();

			/*$matter_details = $this->db->get('matters');

*/
			return $query->result_array();

			
	}

	
	

}

	function get_matter_more_details($matter_id) {

	 if(!is_null($matter_id)){

			$this->db->select('case_notes');
			$this->db->from('case_file_details');
			$this->db->where('matter_id',$matter_id);
			$query = $this->db->get();

			return $query->result_array();

			
	}

	
	

}


	function get_all_clients(){

		$all_clients = $this->db->get('clients');
		return $all_clients->result_array();
	
}

function get_attorney_specialities(){

		$attorney_specialities = $this->db->get('matter_category');
		return $attorney_specialities->result_array();
	
}

function add_attorney($data_for_model){

		$insert_new_attorney = $this->db->insert('attorneys',$data_for_model);
		
	
	}
	

	function get_all_attorneys(){

		$attorneys_counter = $this->db->get('attorneys');
		
		$attorneys_counter = $attorneys_counter->result_array();

		for($counter=0; $counter < count($attorneys_counter); $counter++){
			$attorney_speciality_id = $this->db->get_where('matter_category',array('matter_category_id'=>$attorneys_counter[$counter]['matter_category_id']));

			$attorney_speciality = $attorney_speciality_id->result_array();
			

			$attorneys_counter[$counter]['id'] = $attorney_speciality[0]['matter_category_id']. " "."Law";	


		}

		return $attorneys_counter;
	
}

function get_attorney_details($attorney_id) {

	 if(!is_null($attorney_id)){

			$this->db->select('*');
			$this->db->from('attorneys');
			$this->db->where('attorney_id',$attorney_id);
			$query = $this->db->get();

			return $query->result_array();

			
	}	

}

function delete_attorney($attorney_id){
		if(!is_null($attorney_id)){

			$this->db->where('attorney_id', $attorney_id);
			$this->db->delete('attorneys');


			
	}
	}

	function update_attorney($attorney_id,$data_to_model){
		if(!is_null($attorney_id && $data_to_model)){


			$this->db->where('attorney_id', $attorney_id);
			$this->db->update('attorneys', $data_to_model);




	}
	}

	function get_all_legal_documents(){
		$all_docs = $this->db->get('legal_documents');
		return $all_docs->result_array();
	}

	function get_count_clients(){
		$all_clients = $this->db->get('clients');
		return $all_clients->num_rows();
	}


    
}
