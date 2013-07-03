<?php echo Form::open(array("class" => "formee")); ?>
<div class=headline>	
    <div class="grid-12-12">
        <div class="grid-4-12" style="margin-top:-15px; margin-left:-35px;">
            <h3>Salary Entry for the month of</h3></div>

        <div class="grid-2-12" style="margin-top:18px;color:#f00;">
            <?php echo createMonths('month', $month); ?>
        </div>
        <div class="grid-2-12" style="margin-top:18px;">
            <?php echo createYears(2000, 2050, 'year', $year); ?>
        </div>
        <div class="grid-2-12" style="margin-top:18px;">
            <?php echo Form::submit('submit', 'view'); ?>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php if ($salaries): ?>
    <table class="table table-striped" style="margin-top:95px; width:3600px; margin-right: 50px;">
        <thead>
            <tr>
                <th><?php echo Form::checkbox('all'); ?></th>
                <th>Name</th>
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
                    <td><?php echo Form::checkbox('$employee->id'); ?></td>
                    <td> <?php echo $salary->employee->first_name . ' ' . $salary->employee->last_name; ?></td>
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
                    <td><?php echo Html::anchor('salaries/edit/' . $salary->employee_id . '/' . $month . '/' . $year, '<i class=icon-pencil></i>'); ?>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>    







