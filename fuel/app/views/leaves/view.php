<h2>Viewing <span class='muted'>#<?php echo $leave->id; ?></span></h2>

<p>
	<strong>Employee id:</strong>
	<?php echo $leave->employee_id; ?></p>
<p>
	<strong>Date of leave:</strong>
	<?php echo $leave->date_of_leave; ?></p>
<p>
	<strong>Reason:</strong>
	<?php echo $leave->reason; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $leave->type; ?></p>

<?php echo Html::anchor('leaves/edit/'.$leave->id, 'Edit'); ?> |
<?php echo Html::anchor('leaves', 'Back'); ?>