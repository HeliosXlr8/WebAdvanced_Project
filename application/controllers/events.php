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

		public function add_event()
		{
			$pdata = $this->input->post();
			var_dump($pdata);

			$this->load->model('model_events');
			$data = $this->model_staticdata->getData();
			$data['page_header'] = 'Events';
			
			$data['text'] = 'Add an event';
			
			$this->load->view('head_extended.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('page.php');
			$this->load->view('add_event.php', $pdata);
			$this->load->view('footer.php');

			if (!empty($pdata))
			{
				if (!empty($pdata['name']) && !empty($pdata['date']))
				{
					$this->model_events->addEvent($pdata);
				}
			}
		}

		public function edit_event()
		{

		}

		public function remove_event()
		{
			$pdata = $this->input->post();

			$this->load->model('model_events');
			if (!empty($pdata))
			{
				$this->model_events->removeEvent($pdata);
			}

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