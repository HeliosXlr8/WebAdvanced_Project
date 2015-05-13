<div class="event_manager">
	<table>
		<?php
			$defaultDateFormat = "Y-m-d H:i:s";
			$datenow = date($defaultDateFormat);
			$days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
			$daynames = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
			$firstday = date('01-m-Y');
			print_r(date_parse($firstday));

			echo "<tr><td colspan=7>".date("M")."</td></tr>";
			
			echo "<tr>";
			for ($i=0; $i<7; $i++)
			{
				echo "<td>".$daynames[$i]."</td>";
			}
			echo "</tr>";

			$day = 1;
			for ($i=0; $i<5; $i++)
			{
				echo "<tr>";
				for ($j=0; $j<7; $j++)
				{
					if ($day <= $days)
					{
						echo "<td>".($day)."</td>";
						$day++;
					}
					else
					{
						echo "<td></td>";
					}
				}
				echo "</tr>";
			}

			var_dump($edata);
		?>
	</table>
</div>