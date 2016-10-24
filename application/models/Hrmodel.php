<?php

/**
* 
*/
class Hrmodel extends CI_Model
{
	public $matter_category_id = null;

	function check_hr_credentials($hr_credentials){

		$check_hr_exists = $this->db->get_where('staff',array('staff_email'=>$hr_credentials['hr_email'],'staff_password'=>$hr_credentials['hr_password']));

		if($check_hr_exists->num_rows() > 0){

			$data_to_return['first_name'] = $check_hr_exists->row()->staff_lastName;
			$data_to_return['last_name'] = $check_hr_exists->row()->staff_lastName;

		}
		else{

			$data_to_return = "No Human resource with such credentials in our records. Recheck your details";
		}

		return $data_to_return;
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
	
	function get_leave_applications($status) {

	 if(!is_null($status)){

	 	$this->db->where('status', $status);
		$leave_applications = $this->db->get('leave_applications');
		
		$leave_applications = $leave_applications->result_array();
	

		for($counter=0; $counter < count($leave_applications); $counter++){
			$staff_applied = $this->db->get_where('attorneys',array('attorney_id'=>$leave_applications[$counter]['attorney_id']));
			$staff_data = $staff_applied->result_array();
			
			$leave_applications[$counter]['staff_name'] = $staff_data[0]['attorney_first_name']." ".$staff_data[0]['attorney_last_name'];
			$leave_applications[$counter]['email'] = $staff_data[0]['attorney_email'];

		}

		return $leave_applications;

			
	}	

}
function get_all_leave_applications() {

	 	
		$leave_applications = $this->db->get('leave_applications');
		
		$leave_applications = $leave_applications->result_array();
	

		for($counter=0; $counter < count($leave_applications); $counter++){
			$staff_applied = $this->db->get_where('attorneys',array('attorney_id'=>$leave_applications[$counter]['attorney_id']));
			$staff_data = $staff_applied->result_array();
			
			$leave_applications[$counter]['staff_name'] = $staff_data[0]['attorney_first_name']." ".$staff_data[0]['attorney_last_name'];
			$leave_applications[$counter]['email'] = $staff_data[0]['attorney_email'];

		}

		return $leave_applications;		
	

}


function accept_or_reject_leave_application($leave_id,$data_to_model){
		if(!is_null($leave_id && $data_to_model)){


			$this->db->where('leave_id', $leave_id);
			$this->db->update('leave_applications', $data_to_model);




	}
	}

	// Hr Sidebar stuff

	function get_all_advance(){
  		$advance_applications = $this->db->get('leave_applications');
  		return $advance_applications->result_array();
  	}

	function get_all_leave(){
  		$leave_applications = $this->db->get('advanceSalary_applications');
  		return $leave_applications->result_array();
  	}
  	
  	function get_all_attorneys(){
  		$attorneys_counter = $this->db->get('attorneys');
  		return $attorneys_counter->result_array();
  	}

	

	
	function get_advance_applications($status) {

	 if(!is_null($status)){

	 	$this->db->where('status', $status);
		$advance_applications = $this->db->get('advanceSalary_applications');
		
		$advance_applications = $advance_applications->result_array();
	

		for($counter=0; $counter < count($advance_applications); $counter++){
			$staff_applied = $this->db->get_where('staff',array('staff_id'=>$advance_applications[$counter]['staff_id']));
			$staff_data = $staff_applied->result_array();
			$advance_applications[$counter]['staff_name'] = $staff_data[0]['staff_firstName']." ".$staff_data[0]['staff_lastName'];
			$advance_applications[$counter]['email'] = $staff_data[0]['staff_email'];

		}

		return $advance_applications;

			
	}	

}


function accept_or_accept_advance_application($advance_id,$data_to_model){
		if(!is_null($advance_id && $data_to_model)){


			$this->db->where('advance_salary_applicationID', $advance_id);
			$this->db->update('advanceSalary_applications', $data_to_model);




	}
	}




	
		  
}


/*$query = $this->db->get('mytable');

foreach ($query->result() as $row)
{
    echo $row->title;
}*/
