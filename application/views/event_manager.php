<div class="event_manager">
	<table>
		<?php
			function makeCalender($data)
			{
				$year = 2015;
				$month = 5;
				$days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
				$daynames = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
				$monthnames = array('January', 'February', 'March', 'April', 'May', 
					'June', 'July', 'August', 'September', 'October', 'November', 
					'December');
				$monthdate = strtotime("1-".$month."-".$year);
				$firstday = date('N', $monthdate);

				echo "<tr><td colspan=7>".$monthnames[$month-1]." ($year)"."</td></tr>";
				
				echo "<tr>";
				for ($i=0; $i<7; $i++)
				{
					echo "<td class='weekname'>".$daynames[$i]."</td>";
				}
				echo "</tr>";

				$day = 1;
				$firstdaysDone = false;
				for ($i=0; $i<($firstday>5 ? 6 : 5); $i++)
				{
					$cellsDone = 0;
					echo "<tr>";
					if ($firstday>1 && $firstdaysDone==false)
					{
						for ($j=1; $j<$firstday; $j++)
						{
							echo "<td></td>";
							$cellsDone++;
						}
						$firstdaysDone = true;
					}
					
					for ($j=0; $j<7-$cellsDone; $j++)
					{
						if ($day <= $days)
						{
							$daymarked = false;
							$markedday = 0;
							for ($k=0; $k<count($data); $k++)
							{
								if ($month == date('m',strtotime($data[$k]->date)) &&
									$day == date('d',strtotime($data[$k]->date)) &&
									$day != $markedday)
								{
									echo "<td class='daymarked' id=day".$day.">".$day."</td>";
									$daymarked = true;
									$markedday = $day;
								}
							}
							
							if ($daymarked == false)
								echo "<td id=day".$day.">".$day."</td>";
							
							$day++;
						}
						else
						{
							echo "<td></td>";
						}
					}
					echo "</tr>";
				}

				//var_dump($data);
			}

			makeCalender($edata);
		?>
	</table>
</div>