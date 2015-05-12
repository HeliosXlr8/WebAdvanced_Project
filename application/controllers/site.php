<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Site extends CI_Controller
	{
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
		
		public function index()
		{
			$data = $this->model_staticdata->getData();		
			$data['page_header'] = 'Welcome to TEDxPXL';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			
			$data['text'] = 'this is the homepage';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('footer.php');
		}

		public function algemene_info()
		{
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Algemene info';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			$data['text'] = 'een pagina waar algemene info wordt getoond over de vereniging, een link naar hoe je lid kan worden bij de vereniging, voordelen die leden genieten,...';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('footer.php');
		}

		public function login() {
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Login';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('login.php');
			$this->load->view('footer.php');
		}

		public function members() {
			
			if ($this->session->userdata('is_logged_in')) {
				
				$data = $this->model_staticdata->getData();	
				$data['page_header'] = 'Members area';
				$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
				
				$data['text'] = 'This is a members only page: ';
				
				$this->load->view('head.php', $data);
				$this->load->view('header.php');
				$this->load->view('menubar.php');
				$this->load->view('members_page.php');
				$this->load->view('footer.php');
				
			}
			else {
				redirect('site/restricted');
			}	
		}

		public function restricted() {
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Restricted';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			$data['text'] = 'Acess denied!';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('footer.php');
		}

		public function login_validation() {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-warning">', '</div>');
			
			$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
			
			if ($this->form_validation->run()) {
				$data = array(
					'email' => $this->input->post('email'),
					'is_logged_in' => 1
				);
				$this->session->set_userdata($data);
				redirect('site/members');
			}
			else {
				$this->login();
			}			
		}
		
		public function validate_credentials() {
			$this->load->model('model_users');
			if ($this->model_users->can_log_in()) {
				return true;	
			}
			else {
				$this->form_validation->set_message('validate_credentials', 'Incorrect username or password.');
				return false;
			}
		}
		
		public function logout() {
			$this->session->sess_destroy();
			redirect('site/login');
		}
	}
?>