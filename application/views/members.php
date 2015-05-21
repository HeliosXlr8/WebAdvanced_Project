<div>
	<?php
		$all_users;
		echo '<p>';
		echo 'Total number of users: ' . count($all_users);
		echo '</p>';
		$count = 0;			
	?>
	
	<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>#</th>
				<th>Email</th>
				<th>Nickname</th>
				<th>Role</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($all_users as $user)
				{
					$count += 1;
					echo '<tr onclick="document.location = \'member/id\';">';
						echo '<td>';
				  			echo $count;
						echo '</td>';
						echo '<td>';
				  			echo $user->email;
						echo '</td>';
						echo '<td>';
				  			echo $user->nickname;
						echo '</td>';
						echo '<td>';
				  			echo $user->role;
						echo '</td>';
					echo '</tr>';
				}
			?>
			<!-- coloumn example:
			<tr>
				<td>1</td>
				<td>Column content</td>
				<td>Column content</td>
				<td>Column content</td>
			</tr>
			-->
		</tbody>
	</table>
</div>

