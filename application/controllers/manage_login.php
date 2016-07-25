<?php

//session_start(); //we need to start session in order to access it through CI

Class Manage_Login extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// load model
        $this->load->model('loginmodel','',TRUE);
	}

	// Show login page
	public function index() 
	{
		$this->load->view('login');
	}


	// Check for user login process
	public function user_login_process() 
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				redirect('cine/index/','refresh');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->loginmodel->check_login($data);
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->loginmodel->read_user_information($username);
				if ($result != false) {
					$session_data = array(
									'username' => $result[0]->user_name,
									'email' => $result[0]->user_email,
									);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect('cine/index/','refresh');
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login', $data);
			}
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
	}

}

?>