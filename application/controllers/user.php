<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller
	{
		public function login() {
			$data = $this->model_staticdata->getData();	
			$data['page_header'] = 'Login';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('login.php');
			$this->load->view('footer.php');
		}

		public function members_only() {
			
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
				redirect('user/restricted');
			}	
		}
		
		public function profile($alert) {
			if ($this->session->userdata('is_logged_in')) {
								
				$data = $this->model_staticdata->getData();	
				$data['page_header'] = 'Profile';
				
				$this->load->model('model_users');
				$data['userInfo'] = $this->model_users->getCurentUserInfo();
				
				$data['text'] = 'You can change your profile information here';
				if ($alert == 'success') {
					$data['alert'] = 'Update was a success!';
				}
				else {
					$data['alert'] = '';
				}
				$this->load->view('head.php', $data);
				$this->load->view('header.php');
				$this->load->view('menubar.php');
				$this->load->view('profile.php');
				$this->load->view('footer.php');
				
			}
			else {
				redirect('user/restricted');
			}
		}

		public function members() {
			
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
					'is_logged_in' => 1,
					'role' => $userInfo['role']
				);
				$this->session->set_userdata($data);
				$this->load->model('model_users');
				$userInfo = $this->model_users->getCurentUserInfo();
				$data['role'] = $userInfo['role'];
				$this->session->set_userdata($data);
				redirect('user/members_only');
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
			redirect('user/login');
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
			$userInfo = $this->model_users->getCurentUserInfo();
			if ($this->model_users->is_key_valid($key)) {
				if ($newemail = $this->model_users->add_user($key)) {
					echo "Confirmation completed!";
					$data = array(
						'email' => $newemail,
						'is_logged_in' => 1,
						'role' => $userInfo['role']
					);
					$this->session->set_userdata($data);
					redirect('user/members_only');
				}
				else {
					echo "Failed to add user";
				}
			}
			else {
				echo "Wrong key";
			}			
		}
		
		public function update_profile() {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-warning">', '</div>');
			if (trim($this->input->post('password')) != '' || trim($this->input->post('oldpassword')) != '' || trim($this->input->post('cpassword') != '')) {
				$this->form_validation->set_rules('password', 'Old Password', 'required|md5|trim|callback_validate_credentials');
				$this->form_validation->set_rules('newpassword', 'New Password', 'required|md5|trim|min_length[6]');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|md5|trim|matches[newpassword]');
			}
			
			if (trim($this->input->post('nickname')) != '') {
				$this->form_validation->set_rules('nickname', 'Nickname', 'required|trim|is_unique[users.nickname]');				
			}
			
			if ($this->form_validation->run()) {
				$this->load->model('model_users');
				if($this->model_users->updateUser()) {
					$data['alert'] = 'Update successful!';
				 	redirect('site/profile/success');
				}
				else {
					echo "Write to database failed";
				}
			}
			else {
				redirect('user/profile/user');
			}
		}
	}
?>