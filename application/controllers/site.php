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
			$data['page_header'] = 'Home';
			
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
			
			$data['text'] = 'een pagina waar algemene info wordt getoond over de vereniging, een link naar hoe je lid kan worden bij de vereniging, voordelen die leden genieten,...';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('footer.php');
		}

		public function event_manager()
		{
			$this->load->model('model_events');
			$data = $this->model_staticdata->getData();
			$data['edata'] = $this->model_events->getData();
			$data['page_header'] = 'Events';
			
			$data['text'] = 'Event manager';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('event_manager.php');
			$this->load->view('footer.php');
		}

		public function login() {
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Login';
			
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
		
		public function register() {
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Register';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('register.php');
			$this->load->view('footer.php');
		}
		
		public function register_validation() {
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-warning">', '</div>');
			
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim|min_length[6]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|md5|trim|matches[password]');
			
			$this->form_validation->set_message('is_unique', 'This email address has already been used.');
			
			if ($this->form_validation->run()) {
					
				$key = md5(uniqid());
				
				$message = "<p>Thank you for signing up!</p>";
				$message .= "<p><a href='" . base_url() . "site/register_user/$key'>Click here</a> to confirm your account.</p>";
				
				//confirm account, dit wordt normaal gedaan via mail, maar omdat dit een lokaal project is doen we het even via een simpele echo
				$this->load->model('model_users');
				if ($this->model_users->add_temp_user($key)) {
					echo $message;
				}
				else {
					echo "Problem when adding to the database";
				}

			}
			else {
				$this->register();
			}
		}

		public function register_user($key) {
			$this->load->model('model_users');
			if ($this->model_users->is_key_valid($key)) {
				if ($newemail = $this->model_users->add_user($key)) {
					echo "Confirmation completed!";
					$data = array(
						'email' => $newemail,
						'is_logged_in' => 1
					);
					$this->session->set_userdata($data);
					redirect('site/members');
				}
				else {
					echo "Failed to add user";
				}
			}
			else {
				echo "Wrong key";
			}			
		}
	}
?>