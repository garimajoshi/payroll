<h2>Listing <span class='muted'>Banks</span></h2>
<br>
<?php if ($banks): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Employee id</th>
			<th>Account no</th>
			<th>Account type</th>
			<th>Branch</th>
			<th>City</th>
			<th>State</th>
			<th>Ifsc code</th>
			<th>Payment type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($banks as $bank): ?>		<tr>

			<td><?php echo $bank->employee_id; ?></td>
			<td><?php echo $bank->account_no; ?></td>
			<td><?php echo $bank->account_type; ?></td>
			<td><?php echo $bank->branch; ?></td>
			<td><?php echo $bank->city; ?></td>
			<td><?php echo $bank->state; ?></td>
			<td><?php echo $bank->ifsc_code; ?></td>
			<td><?php echo $bank->payment_type; ?></td>
			<td><?php echo Html::anchor('banks/view/'.$bank->id, '<i class="icon-eye-open" title="View"></i>'); ?></td>
			<td><?php echo Html::anchor('banks/edit/'.$bank->employee_id, '<i class="icon-wrench" title="Edit"></i>'); ?></td>
			<td><?php echo Html::anchor('banks/delete/'.$bank->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td>

		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Banks.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('banks/create', 'Add new Bank', array('class' => 'btn btn-success')); ?>

</p>
