<?php
	class Model_staticdata extends CI_Model {
		
		public function getData() {
			
			$data['navigation'] = array(
				'Home' => 'site',
				'Info' => 'site/algemene_info',
				'Empty' => '#',
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
			return $data;
			
		}
		
	}
?>