<div class=headline><h3><?php echo $employee->title. ' ' .$employee->first_name. ' ' .$employee->last_name; ?></h3></div>	
<br />
<?php $month = array(
    '1' => 'January',
    '2' => 'February',
    '3' => 'March',
    '4' => 'April',
    '5' => 'May',
    '6' => 'June',
    '7' => 'July',
    '8' => 'August',
    '9' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
);
?>
<?php if ($salaries): ?>


<div style="width:4000px;">
    <table class="table table-striped" style="margin-top:5px; width:3600px; margin-right: 50px;">
        <thead>
            <tr>
                <th>Month</th>
                <th>Year</th>
                <th>Gross</th>
                <th>Sodexo</th>
                <th>PF Applicable</th>
                <th>PF Adjust</th>
                <th>Basic</th>
                <th>HRA</th>
                <th>LTA</th>
                <th>Medical</th>
                <th>Travel</th>
                <th>PF Value</th>
                <th>Other Credits</th>
                <th>Leave</th>
                <th>Bonus1</th>
                <th>Bonus2</th>
                <th>Allowance1</th>
                <th>Allowance2</th>
                <th>Allowance3</th>
                <th>Total Credit</th>
                <th></th>
                <th>Professional Tax</th>
                <th>PF Value</th>
                <th>Income Tax</th>
                <th>Deduction1</th>
                <th>Deduction2</th>
                <th>Deduction3</th>
                <th>Total Debit</th>
                <th></th>
                <th>NET</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaries as $salary): ?>
                <tr>
                    <td><?php echo $month[$salary->month]; ?></td>
                    <td><?php echo $salary->year; ?></td>
                    <td><?php echo $salary->gross; ?></td>
                    <td><?php echo $salary->sdxo; ?></td>
                    <td><?php
                        if ($salary->pf_applicable == 1):
                            echo '1';
                        else:
                            echo '0';
                        endif;
                        ?>
                    </td>
                    
                    <td><?php echo $salary->pf_adjust; ?></td>
                    <td><?php echo $salary->basic; ?></td>
                    <td><?php echo $salary->hra; ?></td>
                    <td><?php echo $salary->lta; ?></td>
                    <td><?php echo $salary->medical; ?></td>
                    <td><?php echo $salary->travel; ?></td>
                    <td><?php echo $salary->pf_value; ?></td>
                    <td><?php echo $salary->credit_other; ?></td>
                    <td><?php echo $salary->leave; ?></td>
                    <td><?php echo $salary->bonus1; ?></td>
                    <td><?php echo $salary->bonus2; ?></td>
                    <td><?php echo $salary->allowance1; ?></td>
                    <td><?php echo $salary->allowance2; ?></td>
                    <td><?php echo $salary->allowance3; ?></td>
                    <td><?php echo $salary->credit_total; ?></td>
                    <td></td>
                    <td><?php echo $salary->professional_tax; ?></td>
                    <td><?php echo $salary->pf_value; ?></td>
                    <td><?php echo $salary->income_tax; ?></td>
                    <td><?php echo $salary->deduction1; ?></td>
                    <td><?php echo $salary->deduction2; ?></td>
                    <td><?php echo $salary->deduction3; ?></td>
                    <td><?php echo $salary->total_debit; ?></td>
                    <td></td>
                    <td><?php echo $salary->net; ?></td>
                        
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>    







