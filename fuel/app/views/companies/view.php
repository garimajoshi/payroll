<h2>Viewing <span class='muted'>#<?php echo $company->id; ?></span></h2>

<p>
	<strong>Company name:</strong>
	<?php echo $company->company_name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $company->address; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $company->city; ?></p>
<p>
	<strong>State:</strong>
	<?php echo $company->state; ?></p>
<p>
	<strong>Pincode:</strong>
	<?php echo $company->pincode; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $company->email; ?></p>
<p>
	<strong>Website:</strong>
	<?php echo $company->website; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $company->phone; ?></p>
<p>
	<strong>Phone1:</strong>
	<?php echo $company->phone1; ?></p>

<?php echo Html::anchor('companies/edit/'.$company->id, 'Edit'); ?> |
<?php echo Html::anchor('companies', 'Back'); ?>