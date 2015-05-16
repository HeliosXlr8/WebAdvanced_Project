<?php
	class Model_staticdata extends CI_Model {
		
		public function getData() {
			
			$data['navigation'] = array(
				'Home' => 'site',
				'Info' => 'site/algemene_info',
				'Events' => 'site/event_manager',
				'Empty2' => '#',
				'Empty3' => '#'
			);
			if ($this->session->userdata('is_logged_in')) {
				$data['identity'] = $this->session->userdata('email');
				$data['loginnav'] = array (
					'Empty' => 'site/logout',
					'Logout' => 'site/logout'
				);
			}
			else {
				$data['loginnav'] = array (
					'Login' => 'site/login'
				);
			}
						
			$data['title'] = 'TEDxPXL';
			$data['site_header'] = 'Welcome to TEDxPXL';
			$data['motd'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			return $data;
			
		}
		
	}
?>