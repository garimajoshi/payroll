<?php
$monthname = array(
    '1' => 'Jan',
    '2' => 'Feb',
    '3' => 'Mar',
    '4' => 'Apr',
    '5' => 'May',
    '6' => 'Jun',
    '7' => 'Jul',
    '8' => 'Aug',
    '9' => 'Sep',
    '10' => 'Oct',
    '11' => 'Nov',
    '12' => 'Dec',
);
$address = explode(',', $company->address);

if ($company->state === "Karnataka") {
    $form = 'Form VI, Rule 29 (2)';
} else {
    $form = '';
}
?>

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

<div id="img" style="margin-left: 20px;">
    <?php echo Asset::img('logo-jpg.png'); ?>
</div>

<div id="address">
<?php echo $address[0] . ' • ' . $address[1] . '<br />
            ' . $address[2] . ' • ' . $company->city . ' ' . $company->pincode . '<br />
            ' . $company->state . ' • ' . $company->country . '<br />
            T: ' . $company->phone . ' • E: ' . $company->email . '<br />'; ?>

</div>
<h2 style="text-align:center; margin-top: 100px; margin-left: -100px; font-weight: 900;">SALARY STATEMENT </h2>
<h3 style="margin-left:430px; font-weight:300;"><?php echo $form; ?></h3><br />
<br />  <strong style="margin-left: 20px;">Name:</strong><?php echo $employee->title . ' ' . $employee->first_name . ' ' . $employee->last_name; ?>

<?php if ($salary): ?>
<?php echo Html::anchor('salaries/print/'.$employee->id.'/'.$salary->month.'/'.$salary->year,'Print Payslip',array('class'=>'btn btn-success', 'style'=>'float:right; margin-right:50px; color:#fff;')); ?>

<table class="salary">

    <thead>
        <tr style="border-bottom: 2px solid #000; text-align: left;">
            <th><b>No.</b></th>
            <th><b>Salary Component</b></th>
            <th><b><?php echo $monthname[$salary->month] . ' - ' . $salary->year; ?></b></th>
            <th><b>FYTD</b></th>
        </tr>
    </thead>
    <tbody>
        <tr style="padding-left: 20px;">
            <td>1</td>
            <td>Base Salary</td>
            <td><?php echo $salary->basic;   ?></td>
            <td><?php //echo $salary->basic;   ?></td>
            <td>
        </tr>
        <tr>
            <td>2</td>
            <td>HRA</td>
            <td><?php echo $salary->hra;   ?></td>
            <td><?php //echo $salary->hra;   ?></td>
            <td>
        </tr>
        <tr>
            <td>3</td>
            <td>Conveyance/Transport</td>
            <td><?php echo $salary->travel;   ?></td>
            <td><?php //echo $salary->travel;   ?></td>
            <td>
        </tr>
        <tr>
            <td>4</td>
            <td>Medical</td>
            <td><?php echo $salary->medical;   ?></td>
            <td><?php //echo $salary->medical;   ?></td>
            <td>
        </tr>
        <tr>
            <td>5</td>
            <td>Special Allowance</td>
            <td><?php echo $salary->credit_other;   ?></td>
            <td>6750.00</td>
            <td>
        </tr>
        <tr>
            <td>6</td>
            <td>Bonus</td>
            <td><?php echo $salary->bonus1 + $salary->bonus2;?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr>
            <td>7</td>
            <td>Leave Encashment</td>
            <td><?php echo $salary->leave;   ?></td>
            <td><?php //echo $salary->leave;   ?></td>
            <td>
        </tr>
        <tr>
            <td>8</td>
            <td>Other Allowance</td>
            <td><?php echo $salary->allowance1; ?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr style="border-bottom: 2px solid #000;">
            <td>9</td>
            <td>Other</td>
            <td><?php echo $salary->allowance2 + $salary->allowance3; ?></td>
            <td>0.00</td>
            
        </tr>
        
        <tr style="font-weight:bold; padding-top: 100px;">
            <td>10</td>
            <td>TOTAL INCOME</td>
            <td><?php echo $salary->credit_total;?></td>
            <td></td>
            <td>
        </tr>
        <tr>
            <td>11</td>
            <td>Less:Professional Tax</td>
            <td><?php echo $salary->professional_tax;   ?></td>
            <td><?php //echo $salary->professional_tax;   ?></td>
            <td>
        </tr>
        <tr>
            <td>12</td>
            <td>Less:TDS Witholding</td>
            <td><?php echo $salary->income_tax; ?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr>
            <td>13</td>
            <td>Other Deductions</td>
            <td><?php echo $salary->deduction1; ?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr>
            <td>14</td>
            <td>Other Deductions</td>
            <td><?php echo $salary->deduction2; ?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr style="border-bottom: 2px solid #000;">
            <td>15</td>
            <td>Other Deductions</td>
            <td><?php echo $salary->deduction3; ?></td>
            <td>0.00</td>
            <td>
        </tr>
        <tr style="border-bottom: 2px solid #000; font-weight: bold;">
            <td>20</td>
            <td>TOTAL DEDUCTIONS</td>
            <td><?php echo $salary->total_debit; ?></td>
            <td>19800.00</td>
            <td>
        </tr>
        <tr style="font-weight: bold;">
            <td>30</td>
            <td>NET PAYABLE</td>
            <td><?php echo $salary->net;   ?></td>
            <td>0.00</td>
            <td>
        </tr>
    </tbody>
</table>
<?php endif;?>