<?php 
$total['gross'] = 0.00;
        $total['sdxo'] = 0.00;
        $total['pf_adjust'] = 0.00;
        $total['basic'] = 0.00;
        $total['hra'] = 0.00;
        $total['lta'] = 0.00;
        $total['travel'] = 0.00;
        $total['medical'] = 0.00;
        $total['credit_other'] = 0.00;
        $total['bonus1'] = 0.00;
        $total['bonus2'] = 0.00;
        $total['leave'] = 0.00;
        $total['pf_value'] = 0.00;
        $total['credit_total'] = 0.00;
        $total['allowance1'] = 0.00;
        $total['allowance2'] = 0.00;
        $total['allowance3'] = 0.00;
        $total['professional_tax'] = 0.00;
        $total['income_tax'] = 0.00;
        $total['deduction1'] = 0.00;
        $total['deduction2'] = 0.00;
        $total['deduction3'] = 0.00;
        $total['total_debit'] = 0.00;
        $total['net'] = 0.00;

        foreach($salaries as $salary):
                    $total['gross'] +=$salary->gross;
                $total['sdxo'] += $salary->sdxo;
                $total['pf_adjust'] +=$salary->pf_adjust;
                $total['basic'] += $salary->basic;
                $total['hra'] += $salary->hra;
                $total['lta'] += $salary->lta;
                $total['medical'] += $salary->medical;
                $total['travel'] += $salary->travel;
                $total['credit_other'] += $salary->credit_other;
                $total['bonus1'] += $salary->bonus1;
                $total['bonus2'] += $salary->bonus2;
                $total['leave'] += $salary->leave;
                $total['pf_value'] +=$salary->pf_value;
                $total['credit_total'] += $salary->credit_total;
                $total['allowance1'] += $salary->allowance1;
                $total['allowance2'] += $salary->allowance2;
                $total['allowance3'] += $salary->allowance3;
                $total['professional_tax'] += $salary->professional_tax;
                $total['income_tax'] += $salary->income_tax;
                $total['deduction1'] += $salary->deduction1;
                $total['deduction2'] += $salary->deduction2;
                $total['deduction3'] += $salary->deduction3;
                $total['total_debit'] += $salary->total_debit;
                $total['net'] += $salary->net;
        endforeach;
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
            <?php echo Form::submit('submit', 'View',array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>
<?php if ($salaries): ?>

<?php if($salarylock->lock == 'false'):
echo Html::anchor('salaries/lock/'.$month.'/'.$year,'Lock Payroll',array('class'=>'btn btn-danger','style'=>'color:#fff; margin-left:40px; margin-top:30px;'));
else: ?>
   <span style=" display: inline-block;
    *display: inline;
    padding: 4px 10px 4px;
    margin-bottom: 0;
    *margin-left: .3em;
    font-size: 13px;
    line-height: 18px;
    *line-height: 20px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;background-color: #f5f5f5;
    *background-color: #e6e6e6;
    background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
    background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
    background-image: linear-gradient(top, #ffffff, #e6e6e6);
    background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    *border: 0;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-color: #e6e6e6 #e6e6e6 #bfbfbf;
    border-bottom-color: #b3b3b3;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
    filter: progid:dximagetransform.microsoft.gradient(enabled=false);
    *zoom: 1;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);background-color: #0074cc;
    *background-color: #0055cc;
    background-image: -ms-linear-gradient(top, #0088cc, #0055cc);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0055cc));
    background-image: -webkit-linear-gradient(top, #0088cc, #0055cc);
    background-image: -o-linear-gradient(top, #0088cc, #0055cc);
    background-image: -moz-linear-gradient(top, #0088cc, #0055cc);
    background-image: linear-gradient(top, #0088cc, #0055cc);
    background-repeat: repeat-x;
    border-color: #0055cc #0055cc #003580;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    filter: progid:dximagetransform.microsoft.gradient(startColorstr='#0088cc', endColorstr='#0055cc', GradientType=0);
    filter: progid:dximagetransform.microsoft.gradient(enabled=false);
    color:#fff;
    margin-left: 40px;
    margin-top: 30px;"> <?php echo 'Locked Payroll'; ?></span>
<?php endif;?>
<?php echo Html::anchor('salaries/payroll/'.$month.'/'.$year,'Export',array('class'=>'btn btn-primary','style'=>'color:#fff;margin-top:30px; margin-left:5px;')); ?>
<div style="width:4000px;">
    <table class="table table-striped" style="margin-top:5px; width:3600px; margin-right: 50px;">
        <thead>
            <tr>
                
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
                <th>Bonus #1</th>
                <th>Bonus #2</th>
                <th>Allowance #1</th>
                <th>Allowance #2</th>
                <th>Allowance #3</th>
                <th>Total Credit</th>
                <th></th>
                <th>Professional Tax</th>
                <th>PF Value</th>
                <th>Income Tax</th>
                <th>Deduction #1</th>
                <th>Deduction #2</th>
                <th>Deduction #3</th>
                <th>Total Debit</th>
                <th></th>
                <th>NET</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaries as $salary): ?>
                <tr>
                    
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
                    <td><?php if($salary->lock== 'false'){echo Html::anchor('salaries/edit/' . $salary->employee_id . '/' . $month . '/' . $year, '<i class=icon-pencil></i>');} ?>
                        
                </tr>
            <?php endforeach; ?>
                <tr style="font-weight: 700; border-top:1px solid #ccc;">
                    
                    <td> TOTAL</td>
                    <td><?php echo number_format($total['gross'],2); ?></td>
                    <td><?php echo number_format($total['sdxo'],2); ?></td>
                    <td>
                    </td>
                    
                    <td><?php echo number_format($total['pf_adjust'],2); ?></td>
                    <td><?php echo number_format($total['basic'],2); ?></td>
                    <td><?php echo number_format($total['hra'],2); ?></td>
                    <td><?php echo number_format($total['lta'],2); ?></td>
                    <td><?php echo number_format($total['medical'],2); ?></td>
                    <td><?php echo number_format($total['travel'],2); ?></td>
                    <td><?php echo number_format($total['pf_value'],2); ?></td>
                    <td><?php echo number_format($total['credit_other'],2); ?></td>
                    <td><?php echo number_format($total['leave'],2); ?></td>
                    <td><?php echo number_format($total['bonus1'],2); ?></td>
                    <td><?php echo number_format($total['bonus2'],2); ?></td>
                    <td><?php echo number_format($total['allowance1'],2); ?></td>
                    <td><?php echo number_format($total['allowance2'],2); ?></td>
                    <td><?php echo number_format($total['allowance3'],2); ?></td>
                    <td><?php echo number_format($total['credit_total'],2); ?></td>
                    <td></td>
                    <td><?php echo number_format($total['professional_tax'],2); ?></td>
                    <td><?php echo number_format($total['pf_value'],2); ?></td>
                    <td><?php echo number_format($total['income_tax'],2); ?></td>
                    <td><?php echo number_format($total['deduction1'],2); ?></td>
                    <td><?php echo number_format($total['deduction2'],2); ?></td>
                    <td><?php echo number_format($total['deduction3'],2); ?></td>
                    <td><?php echo number_format($total['total_debit'],2); ?></td>
                    <td></td>
                    <td><?php echo number_format($total['net'],2); ?></td>
                    
                    
 
                </tr>
        </tbody>
    </table>
</div>
<?php else: ?>
<?php    echo Html::anchor('salaries/process/'.$month.'/'.$year,'Process Payroll',array('class'=>'btn btn-success','style'=>'color:#fff; margin-top:30px; margin-left:5px;'));?>


<?php endif; ?>    







