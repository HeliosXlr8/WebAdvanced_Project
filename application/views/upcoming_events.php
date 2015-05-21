<div class="upcoming_events">
	<?php
		for ($i=0; $i<count($edata); $i++)
		{
			echo "<p class='upcoming_events_title'>".$edata[$i]->name."</p>";
			echo "<table><tr>";
			$date = strtotime($edata[$i]->date);
			echo "<td>".date('d-m-Y', $date)."<br/>".date('H:i', $date)."</td>";
			echo "<td>".$edata[$i]->description."</td>";
			echo "</tr></table>";

			if ($i != count($edata)-1)
				echo "<div class='end_line'></div>";
		}
	?>
</div>