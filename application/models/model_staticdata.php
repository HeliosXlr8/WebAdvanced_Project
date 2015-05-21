<?php
	class Model_staticdata extends CI_Model {
		
		public function getData() {
			
			$data['navigation'] = array(
				'Home' => 'site',
				'Info' => 'site/algemene_info',
				'Events' => 'site/events',
				'Empty2' => '#',
				'About' => 'site/about'
			);
			if ($this->session->userdata('is_logged_in')) {
				if ($this->session->userdata('role') == trim('admin')){
					$data['adminnav'] = array(
						'Members' => 'user/members'
					);
				}
				else {
					$data['adminnav'] = array();
				}
				$data['identity'] = $this->session->userdata('email');
				$data['loginnav'] = array (
					'Profile' => 'user/profile/user',
					'Logout' => 'user/logout'
				);
			}
			else {
				$data['loginnav'] = array (
					'Login' => 'user/login',
					'Sign up' => 'user/register'
				);
			}
						
			$data['title'] = 'TEDxPXL';
			$data['site_header'] = 'Welcome to TEDxPXL';
			$data['motd'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			return $data;
			
		}
		
	}
?>