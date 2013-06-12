<h2>Editing <span class='muted'>Salary</span></h2>
<br>

<?php echo render('salaries/_form'); ?>
<p>
	<?php echo Html::anchor('salaries/view/'.$salary->id, 'View'); ?> |
	<?php echo Html::anchor('salaries', 'Back'); ?></p>
