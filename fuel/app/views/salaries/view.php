<?php

$monthname = array(
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
$address = explode(',', $company->address);

if ($employee->branch == "karnataka" or $employee->branch == "Karnataka" or $employee->branch == "Bangalore" or $employee->branch == "bangalore") {
    $form = 'Form VI, Rule 29 (2)';
} else {
    $form = '';
}
?>

<div class=headline>	
    
            <h3>Salary Entry for the month of <span class="muted"><?php echo $monthname[$month].' '.$year;?></span></h3></div>

        
<div id="img" style="margin-left: 20px; font-size: 16px; margin-top:30px;">
    <?php echo Asset::img('logo-jpg.png'); ?>
</div>

<div id="address">
    <?php echo $address[0] . ' • ' . $address[1] . '<br />
            ' . $address[2] . ' • ' . $company->city . ' ' . $company->pincode . '<br />
            ' . $company->state . ' • ' . $company->country . '<br />
            T: ' . $company->phone . ' • E: ' . $company->email . '<br />'; ?>

</div>
<h1 style="text-align:center; margin-top: 100px; margin-left: -100px; font-weight: 900; font-size:20px;">SALARY STATEMENT </h1>
<h3 style="margin-left:460px; font-weight:300;"><?php echo $form; ?></h3><br />
<br />  <strong style="margin-left: 20px; font-size: 16px;"><?php echo $employee->title . '. ' . strtoupper($employee->first_name) . ' ' . strtoupper($employee->last_name); ?>
</strong>
<?php if ($salary): ?>
    <?php echo Html::anchor('salaries/rename/', 'Rename Fields', array('class' => 'btn btn-danger', 'style' => 'float:right; margin-right:150px; color:#fff;')); ?>

    <?php echo Html::anchor('salaries/print/' . $employee->id . '/' . $salary->month . '/' . $salary->year, 'Print Payslip', array('class' => 'btn btn-success', 'style' => 'float:right; margin-right:50px; color:#fff;')); ?>

    <table class="salary">

        <thead>
            <tr style="border-bottom: 2px solid #000; text-align: left;">
                <th  style="width:35px;"><b>No.</b></th>
                <th style="width:200px;"><b>Salary Component</b></th>
                <th style="text-align:right;width:200px;"><b><?php echo $monthname[$salary->month] . ' - ' . $salary->year; ?></b></th>
                <th style="text-align:right;width:180px;"><b>FYTD</b></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($fytd['basic'] != 0) { ?>
                <tr style="padding-left: 20px;">
                    <td>1</td>
                    <td>Base Salary</td>
                    <td style="text-align:right"><?php echo number_format($salary->basic,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['basic'],2); ?></td>
                    
                </tr>
            <?php } ?>
    <?php if ($fytd['hra'] != 0) { ?>

                <tr>
                    <td>2</td>
                    <td>HRA</td>
                    <td style="text-align:right"><?php echo number_format($salary->hra,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['hra'],2); ?></td>
                    
                </tr>
    <?php } ?>
                    <?php if ($fytd['lta'] != 0) { ?>
                <tr>
                    <td>3</td>
                    <td>LTA</td>
                    <td style="text-align:right"><?php echo number_format($salary->lta,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['lta'],2); ?></td>
                        </tr>
    <?php } ?>
                    <?php if ($fytd['travel'] != 0) { ?>

                <tr>
                    <td>4</td>
                    <td>Conveyance/Transport</td>
                    <td style="text-align:right"><?php echo number_format($salary->travel,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['travel'],2); ?></td>
                    
                </tr>
                    <?php } ?>
                    <?php if ($fytd['medical'] != 0) { ?>

                <tr>
                    <td>5</td>
                    <td>Medical</td>
                    <td style="text-align:right"><?php echo number_format($salary->medical,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['hra'],2); ?></td>
                    
                </tr>
                    <?php } ?>
                    <?php if ($fytd['pf_value'] != 0) { ?>

                <tr>
                    <td>5</td>
                    <td>Provident Fund</td>
                    <td style="text-align:right"><?php echo number_format($salary->pf_value,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['pf_value'],2); ?></td>
                    <td>
                </tr>
                    <?php } ?>
    <?php if ($fytd['credit_other'] != 0) { ?>

                <tr>
                    <td>6</td>
                    <td>Special Allowance</td>
                    <td style="text-align:right"><?php echo number_format($salary->credit_other,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['credit_other'],2); ?></td>
                    
                </tr>
    <?php } ?>
    <?php if ($fytd['bonus1'] != 0) { ?>
                <tr>
                    <td>7</td>
                    <td><?php echo $rename->bonus1; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->bonus1,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['bonus1'],2); ?></td>

                </tr>
    <?php } ?>
    <?php if ($fytd['bonus2'] != 0) { ?>
                <tr>
                    <td>8</td>
                    <td><?php echo $rename->bonus2; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->bonus2,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['bonus2'],2); ?></td>

                </tr>
    <?php } ?>
            <?php if ($fytd['leave'] != 0) { ?>
                <tr>
                    <td>9</td>
                    <td>Leave Encashment</td>
                    <td style="text-align:right"><?php echo number_format($salary->leave,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['leave'],2); ?></td>
                    <td>
                </tr>
            <?php } ?>
            <?php if ($fytd['allowance1'] != 0) { ?>
                <tr>
                    <td>10</td>
                    <td><?php echo $rename->allowance1; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->allowance1,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['allowance1'],2); ?></td>
                    <td>
                </tr>
            <?php } ?>
            <?php if ($fytd['allowance2'] != 0) { ?>
                <tr>
                    <td>11</td>
                    <td><?php echo $rename->allowance2; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->allowance2,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['allowance2'],2); ?></td>

                </tr>
    <?php } ?>
                    <?php if ($fytd['allowance3'] != 0) { ?>
                <tr>
                    <td>12</td>
                    <td><?php echo $rename->allowance3; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->allowance3,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['allowance3'],2); ?></td>
                </tr>
    <?php } ?>

            <tr style="font-weight:bold; padding-top: 100px;border-top: 2px solid #000;">
                <td>50</td>
                <td>TOTAL INCOME</td>
                <td style="text-align:right"><?php echo number_format($salary->credit_total,2); ?></td>
                <td style="text-align:right"><?php echo number_format($fytd['credit_total'],2); ?></td>

            </tr>

                    <?php if ($fytd['professional_tax'] != 0) { ?>
                <tr>
                    <td>51</td>
                    <td>Less:Professional Tax</td>
                    <td style="text-align:right"><?php echo number_format($salary->professional_tax,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['professional_tax'],2); ?></td>

                </tr>
                    <?php } ?>
                    <?php if ($fytd['income_tax'] != 0) { ?>
                <tr>
                    <td>52</td>
                    <td>Less:TDS Witholding</td>
                    <td style="text-align:right"><?php echo number_format($salary->income_tax,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['income_tax'],2); ?></td>

                </tr>
                    <?php } ?>
    <?php if ($fytd['deduction1'] != 0) { ?>
                <tr>
                    <td>53</td>
                    <td><?php echo $rename->deduction1; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->deduction1,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['deduction1'],2); ?></td>

                </tr>
    <?php } ?>
    <?php if ($fytd['deduction2'] != 0) { ?>
                <tr>
                    <td>54</td>
                    <td><?php echo $rename->deduction2; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->deduction2,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['deduction2'],2); ?></td>

                </tr>
    <?php } ?>
    <?php if ($fytd['deduction3'] != 0) { ?>
                <tr>
                    <td>55</td>
                    <td><?php echo $rename->deduction3; ?></td>
                    <td style="text-align:right"><?php echo number_format($salary->deduction3,2); ?></td>
                    <td style="text-align:right"><?php echo number_format($fytd['deduction3'],2); ?></td>
                </tr>
    <?php } ?>
            <tr style="font-weight: bold; border-top: 2px solid #000;">
                <td>70</td>
                <td>TOTAL DEDUCTIONS</td>
                <td style="text-align:right"><?php echo number_format($salary->total_debit,2); ?></td>
                <td style="text-align:right"><?php echo number_format($fytd['total_debit'],2); ?></td>

            </tr>
            <tr style="font-weight: bold; border-top: 2px solid #000;">
                <td>80</td>
                <td>NET PAYABLE</td>
                <td style="text-align:right"><?php echo number_format($salary->net,2); ?></td>
                <td style="text-align:right"><?php echo number_format($fytd['net'],2); ?></td>

            </tr>
           
        </tbody>
    </table>
<br />
<span style="margin-left:40px; font-size: 18px;">Notes:</span><br />
    <table style="margin-bottom: 50px; width:600px;">
        <tbody>
            <tr>
                <td style="width:35px;">1</td>
                <td style="width:150px;">Sodexho</td>
                <td style="text-align: right; width: 150px;"><?php echo number_format($salary->sdxo,2); ?></td>
                <td style="text-align: right;width:80px;"><?php echo number_format($fytd['sdxo'],2); ?></td>
            </tr>
            <tr>
                <td style="width:35px;">2</td>
                <td style="width:150px;">Sick Days Balance (Days) </td>
                <td style="text-align: right; width: 150px;"><?php echo $salary->sick_balance; ?> </td>
            </tr>
            <tr>
                <td style="width:35px;">3</td>
                <td style="width:150px;">Vacation Balance(Days) </td>
                <td style="text-align: right; width: 150px;"><?php echo $salary->vacation_balance; ?></td>
            </tr>
        </tbody>
    </table>
    <?php echo Html::anchor('salaries/editleavebalance/'.$salary->employee_id.'/'.$salary->month.'/'.$salary->year,'Edit Leave Balances >>',array('class'=>'btn btn-primary', 'style'=>'color:#fff; margin-left:800px; margin-top:-200px;'));?>


<?php endif; ?>