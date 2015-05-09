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
		
		private $data;

		public function load_elements()
		{
			$data['menubar'] = $this->load->view('menubar.html', NULL, TRUE);

			return true;
		}

		public function index()
		{
			while ($this->load_elements() != true){}
			$this->welcome();
		}

		public function welcome()
		{
			while ($this->load_elements() != true){} // er wordt hier blijkbaar nog niks geladen.. ik snap er niks van
			Site::load_elements(); // werkt ook niet
			//load_elements() // werkt ook niet

			// [tijdelijke oplossing] //
			$data['menubar'] = $this->load->view('menubar.html', NULL, TRUE);
			// [tijdelijke oplossing] //

			$data['title'] = 'TEDxPXL';
			$data['page_header'] = 'Welcome to TEDxPXL';
			$data['message'] = 'TEDxPXL is an independently organized TED event. A place where you learn about cutting-edge ideas and connect with interesting people.';
			
			$this->load->view('welcome_message.php', $data);
			$this->load->view('debug_info.php', $data);
		}

		public function algemene_info()
		{
			// [tijdelijke oplossing] //
			$data['menubar'] = $this->load->view('menubar.html', NULL, TRUE);
			// [tijdelijke oplossing] //

			$data['title'] = 'TEDxPXL';
			$data['page_header'] = 'Algemene info';

			$this->load->view('algemene_info.php', $data);
			$this->load->view('debug_info.php', $data);
		}
	}
?>