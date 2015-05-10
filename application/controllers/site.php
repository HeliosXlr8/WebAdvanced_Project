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
		
		public function loadStaticData() {
			$data['navigation'] = array('first' => 'site', 'second' => 'site/algemene_info');
			$data['title'] = 'TEDxPXL';
			return $data;
		}	
		
		public function index()
		{
			$data = $this->loadStaticData();			
			$data['page_header'] = 'Welcome to TEDxPXL';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			
			$data['text'] = 'this is the homepage';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('welcome_message.php');
			$this->load->view('footer.php');
		}

		public function welcome()
		{

		}

		public function algemene_info()
		{
			$data = $this->loadStaticData();
			$data['page_header'] = 'Algemene info';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			$data['text'] = 'een pagina waar algemene info wordt getoond over de vereniging, een link naar hoe je lid kan worden bij de vereniging, voordelen die leden genieten,...';
			
			$this->load->view('head.php', $data);
			$this->load->view('header.php');
			$this->load->view('menubar.php');
			$this->load->view('welcome_message.php');
			$this->load->view('footer.php');
		}
	}
?>