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
		$this->form_validation->set_rules('username', 'UserName', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		if( $this->session->userdata('authenticated'))
		{
			$this->load->view('home_user');		
		}
		else
		{
			if ( $this->form_validation->run() !== false ) 
			{
				// then validation passed. Get from db
				$this->load->model('admin_model');
				$useremail = $this->input->post('email_address');
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
					if ($this->input->post('rememberme'))
					{
						
					}
					$this->load->view('home_user');
				} else {
					$this->load->view('login');
				}
				
			} else {
				$this->load->view('login');
			}
		}
	}
	
	public function logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('authenticated');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		session_destroy();
		$this->load->view('welcome');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */