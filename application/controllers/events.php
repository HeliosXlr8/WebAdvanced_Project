<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Events extends CI_Controller
	{
		public function events_overview()
		{
			$this->load->model('model_events');
			$this->load->model('model_users');
			$data = $this->model_staticdata->getData();
			$data['edata'] = $this->model_events->getData();
			$data['udata'] = $this->model_users->getCurentUserInfo();
			$data['page_header'] = 'Events';
			
			$data['text'] = 'Hier zijn de Event Manager & Upcoming Events';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('event_manager.php');
			$this->load->view('upcoming_events.php');
			$this->load->view('footer.php');
		}
	}
?>