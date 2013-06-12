<h2>Viewing <span class='muted'>#<?php echo $employee->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $employee->name; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $employee->phone; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $employee->address; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $employee->city; ?></p>
<p>
	<strong>State:</strong>
	<?php echo $employee->state; ?></p>
<p>
	<strong>Pincode:</strong>
	<?php echo $employee->pincode; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $employee->email; ?></p>
<p>
	<strong>Joining date:</strong>
	<?php echo $employee->joining_date; ?></p>
<p>
	<strong>Leaving date:</strong>
	<?php echo $employee->leaving_date; ?></p>
<p>
	<strong>Date of birth:</strong>
	<?php echo $employee->date_of_birth; ?></p>
<p>
	<strong>Sex:</strong>
	<?php echo $employee->sex; ?></p>
<p>
	<strong>Marital status:</strong>
	<?php echo $employee->marital_status; ?></p>
<p>
	<strong>Activity status:</strong>
	<?php echo $employee->activity_status; ?></p>

<?php echo Html::anchor('employees/edit/'.$employee->id, 'Edit'); ?> |
<?php echo Html::anchor('employees', 'Back'); ?>