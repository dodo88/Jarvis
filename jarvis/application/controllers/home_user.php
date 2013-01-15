<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_user extends CI_Controller {

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
	 
	public function __construct()
	{
      session_start();
      parent::__construct();
	}
   
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->form_validation->set_rules('username', "user's email", 'valid_email|required');
		$this->form_validation->set_rules('password', "password", 'required|min_length[4]');
		$this->load->model('admin_model');
		
		if ( $this->form_validation->run() !== false ) 
		{
			$useremail = $this->input->post('username');
			$password = $this->input->post('password');
			
			$res = $this
				->admin_model
				->verify_user(
					$useremail,
					$password
				);

			if ( $res !== false )
			{
				$this->session->set_userdata('username', $useremail);
				$this->session->set_userdata('password', $password);
				$this->session->set_userdata('authenticated', true);
				
				if ($this->input->post('rememberme') == 'rememberme')
				{
					$_COOKIE['rememberme'] = 'rememberme';
					$_COOKIE['username'] = $useremail;
					$_COOKIE['password'] = $password;
				};
				
				$data = array(
					'useremail' => $useremail);				
				$this->load->view('home_user', $data);
			} else {
				$data = array(
					'authenticated' => 'failed');				
				$this->load->view('login', $data);
			}
			
		}
		else if($this->session->userdata('authenticated'))
		{
			$useremail = $this->session->userdata('username');
			$data = array(
					'useremail' => $useremail);				
			$this->load->view('home_user', $data);
		}
		else if (isset($_COOKIE['rememberme']) && $_COOKIE['rememberme'] = 'rememberme'
				&& isset($_COOKIE['username']) && $_COOKIE['username'] != ''
				&& isset($_COOKIE['password']) && $_COOKIE['password'] != '')
		{	
			$useremail = $_COOKIE['username'];
			$password = $_COOKIE['password'];
			
			$res = $this
				->admin_model
				->verify_user(
					$useremail,
					$password
				);

			if ( $res !== false )
			{
				$this->session->set_userdata('username', $useremail);
				$this->session->set_userdata('password', $password);
				$this->session->set_userdata('authenticated', true);
				
				$data = array(
					'useremail' => $useremail);				
				$this->load->view('home_user', $data);
			} else {
				$data = array(
					'authenticated' => 'failed');				
				$this->load->view('login', $data);
			}
		}
		else
		{
			$data = array(
					'authenticated' => 'failed');				
			$this->load->view('login', $data);
		}
	}
	
	public function logout()
	{
		$this->load->library('session');
		$this->load->helper('url');
		
		$this->session->unset_userdata('authenticated');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		
		unset($_COOKIE['rememberme']);
		unset($_COOKIE['username']);
		unset($_COOKIE['password']);
		
		session_destroy();
		
		// $this->load->view('welcome_message_1');
		redirect('', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */