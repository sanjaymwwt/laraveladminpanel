<?php

$html = '
		<h3>Users List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>Username</th>
					<th>Email</th>
					<th>Mobile Number</th>
					<th>Created Date</th>
				</tr>
			</thead>
			<tbody>';

foreach ($users as $row):
    $html .= '		
				<tr class="oddrow">
					<td>' . $row['username'] . '</td>
					<td>' . $row['email'] . '</td>
					<td>' . $row['mobile_no'] . '</td>
					<td>' . $row['created_at'] . '</td>
				</tr>';
endforeach;

$html .= '</tbody>
			</table>			
		 ';

echo $html;
?>