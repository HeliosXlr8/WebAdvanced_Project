<div class="event-editor">
	<form method="post" action=<?php echo site_url("events/add_event") ?>>
		<table>
			<tr>
				<td>name:</td>
				<td>
					<input name="name" type="text" class="form-control" required></input>
				</td>
			</tr>
			<tr>
				<td>time:</td>
				<td>
					<div class="form-group" style="margin:0">
						<div class='input-group date' id='datetimepicker1'>
							<input name="date" type="text" class="form-control" data-date-format="YYYY/MM/DD hh:mm:00" required />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>description:&nbsp;</td>
				<td>
					<textarea name="description" class="form-control" cols="30"></textarea>
				</td>
			</tr>
			<tr>
				<td>location:</td>
				<td>
					<input name="location" class="form-control" type="text"></input>
				</td>
			</tr>
		</table> 
		<input type="submit" value="add" class="btn btn-default"></input>
		<input type="reset" value="reset" class="btn btn-default"></input>
	</form>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#datetimepicker1').datetimepicker();
			$('#datetimepicker1').val("<?php echo $date ?>");
		});
	</script>
</div>