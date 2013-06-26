<h2>Listing <span class='muted'>Companies</span></h2>
<br>
<?php if ($companies): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Pincode</th>
                        <th>Country</th>
			<th>Email</th>
			<th>Website</th>
			<th>Phone</th>
			<th>FAX</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($companies as $company): ?>		<tr>

			
			<td><?php echo $company->address; ?></td>
			<td><?php echo $company->city; ?></td>
			<td><?php echo $company->state; ?></td>
			<td><?php echo $company->pincode; ?></td>
                        <td><?php echo $company->country; ?></td>
			<td><?php echo $company->email; ?></td>
			<td><?php echo $company->website; ?></td>
			<td><?php echo $company->phone; ?></td>
			<td><?php echo $company->fax; ?></td>
			<td>
				<?php echo Html::anchor('companies/view/'.$company->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('companies/edit/'.$company->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('companies/delete/'.$company->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Companies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('companies/create', 'Add new Company', array('class' => 'btn btn-success')); ?>

</p>
