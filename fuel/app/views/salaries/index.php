<h2>Salary Statement for the month of <span class='muted'></span></h2>
<br>
<?php if ($salaries): ?>

<table class="table table-striped">
    <thead style="font-size:14px;">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Gross</th>
            <th>SDXO</th>
            <th>Adjust SDXO</th>
            <th>PFV</th>
            <th>Adjust_CTC</th>
            <th>Basic</th>
            <th>HRA</th>
            <th>LTA</th>
            <th>Medical</th>
            <th>Travel</th>
            <th>PF</th>
            <th>Leave</th>
            <th>Bonus1</th>
            <th>Bonus2</th>
            <th>Allowance1</th>
            <th>Allowance2</th>
            <th>Special Allowances</th>
            <th>Total Credit</th>
            <th></th>
            <th>Professional Tax</th>
            <th>PF</th>
            <th>Income tax</th>
            <th>Deduction1</th>
            <th>Deduction2</th>
            <th>Special Deduction</th>
            <th></th>
            <th>NET</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($salaries as $salary): ?>
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>Gross</td>
            <td>SDXO</td>
            <td>Adjust SDXO</td>
            <td>PFV</td>
            <td>Adjust_CTC</td>
            <td>Basic</td>
            <td>HRA</td>
            <td>LTA</td>
            <td>Medical</td>
            <td>Travel</td>
            <td>PF</td>
            <td>Leave</td>
            <td>Bonus1</td>
            <td>Bonus2</td>
            <td>Allowance1</td>
            <td>Allowance2</td>
            <td>Special Allowances</td>
            <td>Total Credit</td>
            <td></td>
            <td>Professional Tax</td>
            <td>PF</td>
            <td>Income tax</td>
            <td>Deduction1</td>
            <td>Deduction2</td>
            <td>Special Deduction</td>
            <td></td>
            <td>NET</td>
            <td>
				<?php echo Html::anchor('salaries/view/'.$salary->id,'View'); ?> </td>
			<td>	<?php echo Html::anchor('salaries/edit/'.$salary->id,'Edit'); ?> </td>
			<td>	<?php echo Html::anchor('salaries/delete/'.$salary->id,'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>

            
        </tr>
        <?php endforeach; ?>
    
       
    </tbody>
</table>

<?php else: ?>
<p>No Salaries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('salaries/create', 'Add new Entry', array('class' => 'btn btn-success')); ?>

</p>
