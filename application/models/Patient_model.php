<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_Model extends CI_Model {

	// return patient identity
	public function query_patients($patientName)
	{
		$query = $this->db->get_where('Patient_Identification', array('Full_Name'=>$patientName));
	
		if(count($query)==0){
			return false;
		} else {
			return $query->result_array();
		}

	}

	// return visits for specific patient
	public function query_visits($patientID)
	{
		$query = $this->db->order_by('Event_Date', 'DESC')->get_where('Patient_Visit', array('PID'=>$patientID));
		
		if(count($query)==0){
			return false;
		} else {
			return $query->result_array();
		}

	}

	// return insurances for specific visit for a specific patient
	public function query_insurances($visitID)
	{
		$query = $this->db->get_where('Patient_Insurance', array('EID'=>$visitID));
		
		if(count($query)==0){
			return false;
		} else {
			return $query->result_array();
		}

	}

	// return details for specific visit for a specific patient
	public function query_visit_detail($visitID)
	{
		$query = $this->db->get_where('Patient_Visit_Detail', array('EID'=>$visitID));
		
		if(count($query)==0){
			return false;
		} else {
			return $query->result_array();
		}

	}

}

/* End of file patient_model.php */