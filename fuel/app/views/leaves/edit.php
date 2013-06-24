<h2>Editing <span class='muted'>Leave</span></h2>
<br>

<?php echo render('leaves/_form'); ?>
<p>
	<?php echo Html::anchor('leaves/view/'.$leafe->id, 'View'); ?> |
	<?php echo Html::anchor('leaves', 'Back'); ?></p>
