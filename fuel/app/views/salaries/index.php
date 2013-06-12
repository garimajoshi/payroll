<h2>Listing <span class='muted'>Salaries</span></h2>
<br>
<?php if ($salaries): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Employee id</th>
			<th>Month</th>
			<th>Year</th>
			<th>Pf applicable</th>
			<th>Pf date</th>
			<th>Pf scheme</th>
			<th>Pf number</th>
			<th>Gross</th>
			<th>Sdxo</th>
			<th>Pf adjust</th>
			<th>Basic</th>
			<th>Hra</th>
			<th>Lta</th>
			<th>Medical</th>
			<th>Travel</th>
			<th>Pf value</th>
			<th>Credit other</th>
			<th>Bonus1</th>
			<th>Bonus2</th>
			<th>Bonus3</th>
			<th>Leave</th>
			<th>Misc1</th>
			<th>Misc2</th>
			<th>Misc3</th>
			<th>Income tax</th>
			<th>Net</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($salaries as $salary): ?>		<tr>

			<td><?php echo $salary->employee_id; ?></td>
			<td><?php echo $salary->month; ?></td>
			<td><?php echo $salary->year; ?></td>
			<td><?php echo $salary->pf_applicable; ?></td>
			<td><?php echo $salary->pf_date; ?></td>
			<td><?php echo $salary->pf_scheme; ?></td>
			<td><?php echo $salary->pf_number; ?></td>
			<td><?php echo $salary->gross; ?></td>
			<td><?php echo $salary->sdxo; ?></td>
			<td><?php echo $salary->pf_adjust; ?></td>
			<td><?php echo $salary->basic; ?></td>
			<td><?php echo $salary->hra; ?></td>
			<td><?php echo $salary->lta; ?></td>
			<td><?php echo $salary->medical; ?></td>
			<td><?php echo $salary->travel; ?></td>
			<td><?php echo $salary->pf_value; ?></td>
			<td><?php echo $salary->credit_other; ?></td>
			<td><?php echo $salary->bonus1; ?></td>
			<td><?php echo $salary->bonus2; ?></td>
			<td><?php echo $salary->bonus3; ?></td>
			<td><?php echo $salary->leave; ?></td>
			<td><?php echo $salary->misc1; ?></td>
			<td><?php echo $salary->misc2; ?></td>
			<td><?php echo $salary->misc3; ?></td>
			<td><?php echo $salary->income_tax; ?></td>
			<td><?php echo $salary->net; ?></td>
			<td>
				<?php echo Html::anchor('salaries/view/'.$salary->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('salaries/edit/'.$salary->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('salaries/delete/'.$salary->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Salaries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('salaries/create', 'Add new Salary', array('class' => 'btn btn-success')); ?>

</p>
