<?php
	class Model_events extends CI_Model
	{	
		public function getData()
		{
			$query = $this->db->get('events');
			
			return $query->result();
		}
	}
?>