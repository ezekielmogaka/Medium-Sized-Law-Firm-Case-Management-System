<?php

/**
* 
*/
class Main_model extends CI_Model
{
	public $matter_id = null;
	public $legal_document_cat_id = null;
	


	function check_login_credentials($attorney_credentials){

		$query = $this->db->get_where('attorneys',array('attorney_email'=>$attorney_credentials['staff_email'],'attorney_password'=>$attorney_credentials['staff_password']));
			

		if($query->num_rows() > 0){

			$data_to_return['attorney_id'] = $query->row()->attorney_id;
			$data_to_return['attorney_first_name'] = $query->row()->attorney_first_name;
			$data_to_return['attorney_last_name'] = $query->row()->attorney_last_name;

		}
		else{

			$data_to_return = "No attorney with such credentials in our records. Recheck your details";
		}

		return $data_to_return;
	}

	function get_document_categories(){
		$document_categories = $this->db->get('legal_documents_categories');
		
		return $document_categories->result_array();

	}
	function get_matter_categories() {

		
	 $this ->db->select('matter_category_id, matter_category_name');
	 $query = $this->db-> get('matter_category');

	 return $query->result();
	}

	function get_subcategories_by_category(){


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



function get_assigned_matters($status, $attorney_id){

		

		$query = $this->db->get_where('matters',array('matter_status'=>$status,'attorney_id'=> $attorney_id));

			return $query->result_array();

	}

function get_all_documents(){
		$all_documents = $this->db->get('legal_documents');
		return $all_documents->result_array();
	
}

function add_legal_document($data_to_model){

		$insert_legal_document = $this->db->insert('legal_documents',$data_to_model);
		
	
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


	
	function add_caseFile_document($data_to_model){

		$insert_caseFile_document = $this->db->insert('case_file_documents',$data_to_model);
		
	
	}
	function get_caseFile_documents($matter_id) {

	 if(!is_null($matter_id)){
			$this->db->select('*');
			$this->db->from('case_file_documents');
			$this->db->where('matter_id',$matter_id);
			$query = $this->db->get();
			 

			return $query->result_array();

			
	}	

}
	function add_case_notes($data_to_model){

		
		$insert_case_notes = $this->db->insert('case_file_details',$data_to_model);
		
	}
	

	function get_clients() {

		
	 $this ->db->select('client_id, client_firstName,client_lastName');
	 $query = $this->db-> get('clients');

	 return $query->result();
	}

	function get_matter_details($matter_id) {

	 if(!is_null($matter_id)){


		$this->db->where('matter_id', $matter_id);
		$matters = $this->db->get('matters');
		
		$matters = $matters->result_array();

		for($counter=0; $counter < count($matters); $counter++){
			$matter_client = $this->db->get_where('clients',array('client_id'=>$matters[$counter]['client_id']));
			
			$client_data = $matter_client->result_array();
			$matters[$counter]['client_name'] = $client_data[0]['client_firstName']." ".$client_data[0]['client_lastName'];
			$matters[$counter]['client_email'] = $client_data[0]['client_email'];
			$matters[$counter]['client_phone'] = $client_data[0]['client_phone'];

		}

		return $matters;

			
	}
}



	function get_similar_cases($matter_id) {

	 if(!is_null($matter_id)){

	 			

			//$similar_matters = $similar_matters->result_array();
			//for($counter=0; $counter < count($similar_matters); $counter++){
			/*$similar_matters[$counter]['matter_name'] = $similar_case[0]['matter_name'];
			$similar_matters[$counter]['matter_description'] = $similar_case[0]['matter_description'];
			$similar_matters[$counter]['matter_id'] = $similar_case[0]['matter_id'];
			$similar_matters[$counter]['case_notes'] = $similar_case[0]['case_notes'];*/

			$matter_status = "Closed";
			
			$similar_matters = $this->db->get_where('matters',array('matter_id'=>$matter_id));
			$similar_matters = $similar_matters->row();


			/*print_r($similar_matters);
			exit();*/


				$similar_cases = $this->db->get_where('matters',array('matter_category_id'=>$similar_matters->matter_category_id, 
				'matter_subcategory_id'=>$similar_matters->matter_subcategory_id, 
				'matter_status'=>$matter_status));
			$similar_cases = $similar_cases->result_array();		

		}
		

	return $similar_cases;

			
	
}

	function get_matter_more_details($matter_id) {

	 if(!is_null($matter_id)){
	 	

			$this->db->select('case_notes,matter_id');
			$this->db->from('matters');
			$this->db->where('matter_id',$matter_id);
			$query = $this->db->get();
			 

			return $query->result_array();

			
	}	

}
function update_matter_notes($data_to_model) {

	 if(!is_null($data_to_model)){
	 	$this->db->where('matter_id',$data_to_model['matter_id']);
		$query = $this->db->update('matters',$data_to_model);
	 	
	 	echo "Updated Successifully";

	 	return;		

			
	}	

}

function insert_leave_applications($data_to_model){
		if(!is_null($data_to_model)){


			$insert_leave_application = $this->db->insert('leave_applications',$data_to_model);
		
	}
	}
	function 	insert_advanceSalary_application($data_to_model)
{
		if(!is_null($data_to_model)){


			$insert_advanceSalary_application = $this->db->insert('advanceSalary_applications',$data_to_model);
		
	}
	}

}
