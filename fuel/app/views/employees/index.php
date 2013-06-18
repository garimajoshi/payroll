<h2>Listing <span class='muted'>Employees</span></h2>
<br>
<?php if ($employees): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>First Name</th>
                        <th>Last Name</th>
			<th>Phone</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Pincode</th>
			<th>Email</th>
			<th>Joining date</th>
			<th>Leaving date</th>
			<th>Date of birth</th>
			<th>Sex</th>
			<th>Marital status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($employees as $employee): ?>		<tr>

			<td><?php echo $employee->first_name; ?></td>
                        <td><?php echo $employee->last_name; ?></td>
			<td><?php echo $employee->phone; ?></td>
			<td><?php echo $employee->address; ?></td>
			<td><?php echo $employee->city; ?></td>
			<td><?php echo $employee->state; ?></td>
			<td><?php echo $employee->pincode; ?></td>
			<td><?php echo $employee->email; ?></td>
			<td><?php echo $employee->joining_date; ?></td>
			<td><?php echo $employee->leaving_date; ?></td>
			<td><?php echo $employee->date_of_birth; ?></td>
			<td><?php echo $employee->sex; ?></td>
			<td><?php echo $employee->marital_status; ?></td>
			<td>
				<?php echo Html::anchor('employees/view/'.$employee->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('employees/edit/'.$employee->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('employees/delete/'.$employee->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Employees.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('employees/create', 'Add new Employee', array('class' => 'btn btn-success')); ?>

</p>
