<?php
	class Model_events extends CI_Model
	{	
		public function getData()
		{
			$this->db->select("*");
			$this->db->from("events");
			$this->db->order_by("date", "desc");
			$query = $this->db->get();
			
			return $query->result();
		}
	}
?>