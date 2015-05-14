<div class="event_manager">
	<?php
		function build($data)
		{
			$days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
			$daynames = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
			$monthnames = array('January', 'February', 'March', 'April', 'May', 
				'June', 'July', 'August', 'September', 'October', 'November', 
				'December');

			$yearNow = date('Y');
			$monthNow = date('m');

			$year = $yearNow;
			$month = 0;

			for ($h=0; $h<12; $h++)
			{
				$month++;
				$monthdate = strtotime("1-".$month."-".$year);
				$firstday = date('N', $monthdate);

				if ($month == $monthNow)
					echo "<table id='"."month$month"."'>";
				else
					echo "<table id='"."month$month"."' style='display:none'>";
				
				echo "<tr>";
				echo "<td class='calendarArrow' onclick='prevMonth()'>&lt;</td>";
				echo "<td class='calendarTitle' colspan=5>".$monthnames[$month-1]." ($year)"."</td>";
				echo "<td class='calendarArrow' onclick='nextMonth()'>&gt;</td>";
				echo "</tr>";
				
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
									if (date('m') == $month && date('d') == $day)
									{
										echo "<td class='daymarked today' id=day".$day.">".$day."</td>";
									}
									else
										echo "<td class='daymarked' id=day".$day.">".$day."</td>";
									
									$daymarked = true;
									$markedday = $day;
								}
							}
							
							if (date('m') == $month && date('d') == $day)
							{
								if ($daymarked == false)
									echo "<td class='today' id=day".$day.">".$day."</td>";
							}
							else if ($daymarked == false)
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
				echo "</table>";
			}
		}

		build($edata);
	?>

	<script>
		var month = <?php echo (int)date('m') ?>;

		function prevMonth()
		{
			if (month-1 >= 1)
			{
				document.getElementById("month"+month).style.display="none";
				document.getElementById("month"+(month-=1)).style.display="block";
			}
		}

		function nextMonth()
		{
			if (month+1 <= 12)
			{
				document.getElementById("month"+month).style.display="none";
				document.getElementById("month"+(month+=1)).style.display="block";
			}
		}
	</script>
</div>