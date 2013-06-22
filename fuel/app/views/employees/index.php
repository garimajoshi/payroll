
<h2>Listing <span class='muted'>Employees</span></h2>
<br>
<?php if ($employees): ?>
<table class="table table-striped">
	<thead>
		<tr>
                        <th>Employee ID</th>
			<th>First Name</th>
                        <th>Last Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Details</th>
			<th>Edit</th>
			<th>Archive</th>
			
		</tr>
	</thead>
	<tbody>
<?php foreach ($employees as $employee): ?>		<tr>

			<td><?php echo $employee->id; ?></td>
                        <td><?php echo $employee->first_name; ?></td>
			<td><?php echo $employee->last_name; ?></td>
			<td><?php echo $employee->phone; ?></td>
			<td><?php echo $employee->email; ?></td>
			<td><a href="employees/view/" style="list-style: none;">View</a></td>

			</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Employees.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('employees/create', 'Add new Employee', array('class' => 'btn btn-success')); ?>

</p>
