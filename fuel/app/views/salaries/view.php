<h2>Viewing <span class='muted'>#<?php echo $salary->id; ?></span></h2>

<p>
	<strong>Employee id:</strong>
	<?php echo $salary->employee_id; ?></p>
<p>
	<strong>Month:</strong>
	<?php echo $salary->month; ?></p>
<p>
	<strong>Year:</strong>
	<?php echo $salary->year; ?></p>
<p>
	<strong>Pf applicable:</strong>
	<?php echo $salary->pf_applicable; ?></p>
<p>
	<strong>Pf date:</strong>
	<?php echo $salary->pf_date; ?></p>
<p>
	<strong>Pf scheme:</strong>
	<?php echo $salary->pf_scheme; ?></p>
<p>
	<strong>Pf number:</strong>
	<?php echo $salary->pf_number; ?></p>
<p>
	<strong>Gross:</strong>
	<?php echo $salary->gross; ?></p>
<p>
	<strong>Sdxo:</strong>
	<?php echo $salary->sdxo; ?></p>
<p>
	<strong>Pf adjust:</strong>
	<?php echo $salary->pf_adjust; ?></p>
<p>
	<strong>Basic:</strong>
	<?php echo $salary->basic; ?></p>
<p>
	<strong>Hra:</strong>
	<?php echo $salary->hra; ?></p>
<p>
	<strong>Lta:</strong>
	<?php echo $salary->lta; ?></p>
<p>
	<strong>Medical:</strong>
	<?php echo $salary->medical; ?></p>
<p>
	<strong>Travel:</strong>
	<?php echo $salary->travel; ?></p>
<p>
	<strong>Pf value:</strong>
	<?php echo $salary->pf_value; ?></p>
<p>
	<strong>Credit other:</strong>
	<?php echo $salary->credit_other; ?></p>
<p>
	<strong>Bonus1:</strong>
	<?php echo $salary->bonus1; ?></p>
<p>
	<strong>Bonus2:</strong>
	<?php echo $salary->bonus2; ?></p>
<p>
	<strong>Bonus3:</strong>
	<?php echo $salary->bonus3; ?></p>
<p>
	<strong>Leave:</strong>
	<?php echo $salary->leave; ?></p>
<p>
	<strong>Misc1:</strong>
	<?php echo $salary->misc1; ?></p>
<p>
	<strong>Misc2:</strong>
	<?php echo $salary->misc2; ?></p>
<p>
	<strong>Misc3:</strong>
	<?php echo $salary->misc3; ?></p>
<p>
	<strong>Income tax:</strong>
	<?php echo $salary->income_tax; ?></p>
<p>
	<strong>Net:</strong>
	<?php echo $salary->net; ?></p>

<?php echo Html::anchor('salaries/edit/'.$salary->id, 'Edit'); ?> |
<?php echo Html::anchor('salaries', 'Back'); ?>