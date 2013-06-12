<h2>Editing <span class='muted'>Company</span></h2>
<br>

<?php echo render('companies/_form'); ?>
<p>
	<?php echo Html::anchor('companies/view/'.$company->id, 'View'); ?> |
	<?php echo Html::anchor('companies', 'Back'); ?></p>
