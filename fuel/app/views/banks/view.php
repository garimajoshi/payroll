<h2>Viewing <span class='muted'>#<?php echo $bank->id; ?></span></h2>

<p>
	<strong>Employee id:</strong>
	<?php echo $bank->employee_id; ?></p>
<p>
	<strong>Account no:</strong>
	<?php echo $bank->account_no; ?></p>
<p>
	<strong>Account type:</strong>
	<?php echo $bank->account_type; ?></p>
<p>
	<strong>Branch:</strong>
	<?php echo $bank->branch; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $bank->city; ?></p>
<p>
	<strong>State:</strong>
	<?php echo $bank->state; ?></p>
<p>
	<strong>Ifsc code:</strong>
	<?php echo $bank->ifsc_code; ?></p>
<p>
	<strong>Payment type:</strong>
	<?php echo $bank->payment_type; ?></p>

<?php echo Html::anchor('banks/edit/'.$bank->id, 'Edit'); ?> |
<?php echo Html::anchor('banks', 'Back'); ?>