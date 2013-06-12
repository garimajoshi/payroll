<h2>Listing <span class='muted'>Leaves</span></h2>
<br>
<?php if ($leaves): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Employee id</th>
			<th>Date of leave</th>
			<th>Reason</th>
			<th>Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($leaves as $leafe): ?>		<tr>

			<td><?php echo $leafe->employee_id; ?></td>
			<td><?php echo $leafe->date_of_leave; ?></td>
			<td><?php echo $leafe->reason; ?></td>
			<td><?php echo $leafe->type; ?></td>
			<td>
				<?php echo Html::anchor('leaves/view/'.$leafe->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('leaves/edit/'.$leafe->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('leaves/delete/'.$leafe->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Leaves.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('leaves/create', 'Add new Leafe', array('class' => 'btn btn-success')); ?>

</p>
