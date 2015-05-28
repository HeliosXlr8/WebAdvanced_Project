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

		public function addEvent($eventData)
		{
			if ($eventData['description'] == "")
				$eventData['description'] = null;
			if ($eventData['location'] == "")
				$eventData['location'] = null;

			$this->db->insert('events', $eventData);
		}

		public function removeEvent($eventData)
		{
			$this->db->where('id', $eventData['id']);
			$this->db->delete('events');
		}

		public function editEvent($eventData)
		{
			
		}
	}
?>