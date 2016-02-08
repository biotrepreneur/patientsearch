<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	function __construct() {

		parent::__construct();

		$this->load->model('patient_model');
	
	}

	public function index()
	{
		//$patientName = 'RICHARD OVERHOLT';
		$patientName = '';
		//$patientID = '11227';
		$patientID='';
		//$visitID = '385';
		$visitID='';

		//$patients = $this->patient_model->query_patients($patientName);
		//$data['patientList']=$patients;

		//$patientVisits = $this->patient_model->query_visits($patientID);
		//$data['visitList']=$patientVisits;

		//$patientInsurances = $this->patient_model->query_insurances($visitID);
		//$data['insuranceList']=$patientInsurances;

		//$this->load->view('patient_search', $data);

		$this->load->view('patient_search');

	}

	public function all_patients() {

		$patientName = $this->input->post('patientName');

		$patientList =  array();
		$patients = $this->patient_model->query_patients($patientName);
		if($patients!=FALSE){
			foreach($patients as $patient) {
				$patientID = $patient['PID'];
				array_push($patientList, $patient['PID']);
			}
		//$data['patientList']=$patientList;
		$data['patientList']=$patients;

		$patientID = $patientList[0];

		$visitList =  array();
		$patientVisits = $this->patient_model->query_visits($patientID);
			foreach($patientVisits as $visit) {
				$visitID = $visit['EID'];
				array_push($visitList, $visit['EID']);
			}
		//$data['visitList']=$visitList;
		$data['visitList']=$patientVisits;

		/*$visitID = $visitList[0];

		$insuranceList =  array();
		$patientInsurances = $this->patient_model->query_insurances($visitID);
			foreach($patientInsurances as $insurance) {
				$insuranceID = $insurance['Primary_Insurance'];
				array_push($insuranceList, $insurance['Primary_Insurance']);
			}
		//$data['insuranceList']=$insuranceList;
		$data['insuranceList']=$patientInsurances;*/

		$insuranceList =  array();
			foreach($visitList as $visitID) {
				$patientInsurances = $this->patient_model->query_insurances($visitID);
				array_push($insuranceList, $patientInsurances);
			}
		$data['insuranceList']=$insuranceList;
		
		}

		if($patients!=FALSE){
			$this->load->view('results_view', $data);
		} else {
			$this->load->view('unknown_view');
		}
	}

	
	/*public function all_patients()
	{
		$this->load->view('welcome_message');
	}*/

	/*public function one_patient()
	{
		$this->load->view('welcome_message');
	}*/

	/*public function all_visits()
	{
		$this->load->view('welcome_message');
	}*/

	/*public function one_visit()
	{
		$this->load->view('welcome_message');
	}*/

	/*public function all_insurances()
	{
		$this->load->view('welcome_message');
	}*/

	/*public function one_insurance()
	{
		$this->load->view('welcome_message');
	}*/

}
