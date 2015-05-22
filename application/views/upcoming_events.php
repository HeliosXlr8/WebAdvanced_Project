<div class="upcoming_events">
	<?php
		$dates = array();
		for ($i=0; $i<count($edata); $i++)
		{
			array_push($dates, strtotime($edata[$i]->date));
		}

		for ($i=0; $i<count($dates); $i++)
		{
			$date = $dates[$i];

			echo "<div class='upcoming_events_item'>";
			echo "<p class='upcoming_events_title'>".$edata[$i]->name."</p>";
			echo "<table><tr>";
			echo "<td>".date('d-m-Y', $date)."<br/>".date('H:i', $date)."</td>";
			echo "<td>".filterOnNull($edata[$i]->description)."</td>";
			echo "</tr></table>";
			echo "</div>";
		}

		function filterOnNull($string)
		{
			if ($string == "")
			{
				return "<i>no description</i>";
			}
			return $string;
		}
	?>
</div>