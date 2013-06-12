<h2>Viewing <span class='muted'>#<?php echo $leafe->id; ?></span></h2>

<p>
	<strong>Employee id:</strong>
	<?php echo $leafe->employee_id; ?></p>
<p>
	<strong>Date of leave:</strong>
	<?php echo $leafe->date_of_leave; ?></p>
<p>
	<strong>Reason:</strong>
	<?php echo $leafe->reason; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $leafe->type; ?></p>

<?php echo Html::anchor('leaves/edit/'.$leafe->id, 'Edit'); ?> |
<?php echo Html::anchor('leaves', 'Back'); ?>