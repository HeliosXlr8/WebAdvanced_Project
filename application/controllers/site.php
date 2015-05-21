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
		 * !! hitaccess toegevoegd je kan index.php nu weglaten !!
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
			
			$data['text'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
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
		
	}
?>