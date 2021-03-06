<div class="event_manager">
	<?php
		$GLOBALS['userRole'] = $udata['role'];

		$daynames = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
		$monthnames = array('January', 'February', 'March', 'April', 'May', 
			'June', 'July', 'August', 'September', 'October', 'November', 
			'December');

		$yearNow = date('Y');
		$monthNow = date('m');

		$year = $yearNow;
		$month = 0;

		echo "<table>";
		echo "<tr>";
		echo "<td class='calendar'>";
		for ($h=0; $h<12; $h++)
		{
			$month++;
			$monthdate = strtotime("1-".$month."-".$year);
			$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
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
			for ($i=0; $i<($firstday+$days>36 ? 6 : 5); $i++)
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
						for ($k=0; $k<count($edata); $k++)
						{
							if ($month == date('m',strtotime($edata[$k]->date)) &&
								$day == date('d',strtotime($edata[$k]->date)) &&
								$day != $markedday)
							{
								if (date('m') == $month && date('d') == $day)
								{
									echo "<td class='day daymarked today' id=".$edata[$k]->id.">".$day."</td>";
								}
								else
									echo "<td class='day daymarked' id=".$edata[$k]->id.">".$day."</td>";
								
								$daymarked = true;
								$markedday = $day;
							}
						}
						
						if (date('m') == $month && date('d') == $day)
						{
							if ($daymarked == false)
								echo "<td class='day today'>".$day."</td>";
						}
						else if ($daymarked == false)
							echo "<td class='day'>".$day."</td>";

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
		echo "</td>";
		
		echo "<td class='event_summary'>";
		echo "<table>";
		echo "<tr>";
		echo "<td class='event_summary_title'>summary</td>";
		echo "</tr>";
		echo "<tr>";

		echo "<td class='event_summary_desc'>";
		echo "<div class='event_summary_desc_div'>";
		echo "</div>";
		echo "</td>";

		echo "</tr>";
		echo "</table>";
		echo "</td>";	
		echo "</tr>";
		echo "</table>";
	?>

	<script>
		userRole = <?php echo '"'.$GLOBALS['userRole'].'"' ?>;
		data = <?php echo json_encode($edata) ?>;
		month = <?php echo (int)date('m') ?>;
		day = <?php echo (int)date('d') ?>;

		calendar = undefined;
		calDays = undefined;
		dates = [];
		summary_titles = document.getElementsByClassName("event_summary_title");
		summary_descs = document.getElementsByClassName("event_summary_desc_div");
		
		addBtn = undefined;
		editBtn = undefined;
		removeBtn = undefined;

		update_event_title(day, month);
		fill_dates();
		bind_days();
		update_event_desc(day, month);
		
		function fill_dates()
		{
			for (var j=0; j<data.length; j++)
			{
				dates[j] = new Date(data[j].date);
			}
		}

		function bind_days()
		{
			calendar = document.getElementById("month"+month);
			calDays = calendar.getElementsByClassName("day");
			
			for (var i=0; i<calDays.length; i++)
			{
				calDays[i].name = i+1;
				calDays[i].addEventListener("click", 
					function(){dayListener(this.name, month)});
			}
		}

		function dayListener(day, month)
		{
			update_event_title(day, month);
			update_event_desc(day, month);
		}

		function update_event_desc(day, month)
		{
			for (var i=0; i<summary_descs.length; i++)
			{
				var summary = summary_descs[i];
				var buffer = "";
				
				if (userRole != "admin")
					summary.innerHTML = "nothing special";
				
				for (var j=0; j<data.length; j++)
				{	
					if (userRole == "admin")
					{
						addBtn = '<form method="post" action="<?php echo site_url("events/add_event") ?>">' +
								"<input type='hidden' name='date' value='"+data[j].date+"'></button>" +
								"<input type='submit' value='add event'></button>" +
							"</form>";
					}

					if (month==dates[j].getMonth()+1 &&
						day==dates[j].getDate())
					{
						var desc = "";

						desc += "<div class='event_item'><ul class='desc_list'>"
							+"<li><span class='param'>name: </span>"+data[j].name+"</li>"
							+"<li><span class='param'>time: </span>"+getReadableTime(dates[j])+"</li>"
							+"<li><span class='param'>description: </span>"+filterOnNull(data[j].description)+"</li>"
							+"<li><span class='param'>location: </span>"
								+linkToGM(filterOnNull(data[j].location))+"</li>"
							+"</ul>";
						
						if (userRole == "admin")
						{
							editBtn = '<form method="post" action="<?php echo site_url("events/edit_event") ?>">' +
									"<input type='submit' value='edit'></button>" +
								"</form>";
							removeBtn = '<form method="post" action="<?php echo site_url("events/remove_event") ?>">' +
									"<input type='hidden' name='id' value='"+data[j].id+"'/>" +
									"<input type='submit' value='remove'></button>" +
								"</form>";

							desc += editBtn+"&nbsp;"+removeBtn;
						}
						desc += "</div>";
						
						buffer += desc;
					}
				}
			}

			if (userRole != "admin")
				summary.innerHTML = buffer || "nothing special";
			else
				summary.innerHTML = buffer + addBtn;
		}

		function linkToGM(str)
		{
			var newStr = str;
			if (newStr != "not specified")
			{
				newStr = str.replace(/ /g, "+");
				return "<a target='_blank' href=https://maps.google.com?q="+newStr+">"+str+"</a>";
			}
			return str;
		}

		function filterOnNull(str)
		{
			if (str != null)
				return str;
			return "not specified";
		}

		function update_event_title(day, month)
		{
			for (var i=0; i<summary_titles.length; i++)
			{
				summary_titles[i].innerHTML = "events for "+day+"/"+month;
			}
		}

		function prevMonth()
		{
			if (month-1 >= 1)
			{
				document.getElementById("month"+month).style.display="none";
				document.getElementById("month"+(month-=1)).style.display="block";
			}
			
			bind_days();
		}

		function nextMonth()
		{
			if (month+1 <= 12)
			{
				document.getElementById("month"+month).style.display="none";
				document.getElementById("month"+(month+=1)).style.display="block";
			}
			
			bind_days();
		}

		function getReadableTime(date)
		{
			var hours = date.getHours();
			var minutes = (date.getMinutes()<10?'0':'') + date.getMinutes();

			return hours+":"+minutes;
		}
	</script>
</div>