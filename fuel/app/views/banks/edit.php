<h2>Editing <span class='muted'>Bank</span></h2>
<br>

<?php echo render('banks/_form'); ?>
<p>
	<?php echo Html::anchor('banks/view/'.$bank->id, 'View'); ?> |
	<?php echo Html::anchor('banks', 'Back'); ?></p>
