<h2>Salary Entry For the Month of 
<?php echo createMonths('start_month', date('m')); ?> <?php echo createYears(2000, 2020, 'start_year', date('Y')); ?>
</h2>

<br />
<strong>Name: </strong>
<?php echo render('salaries/_form'); ?>

<div id="previewslip"> 
    <h3 style="text-align:center; padding-top: 10px">Payslip for the Month of <script>document.write(x)</script></h3>
        <div class="debit">
        <span style="font-size: 16px;"><strong>Deductions</strong></span><br />
	<em>Professional Tax:</em><br />
	<em>PF:</em><br />
	<em>Income tax:</em><br />
	<em>Deduction1:</em><br />
	<em>Deduction2:</em><br />
	<em>Special Deduction:</em>
    </div>

    <div class="credits">
    <span style="font-size: 16px;"><strong>Credits</strong></span><br />
    <em>Basic:</em>
    
    <br />
	<em>HRA:</em><br />
	<em>LTA:</em><br />
	<em>Medical:</em><br />	
	<em>Travel:</em><br />
	<em>PF:</em><br />
	<em>Leave:</em><br />
	<em>Bonus1:</em><br />
	<em>Bonus2:</em><br />
	<em>Allowance1:</em><br />
	<em>Allowance2:</em><br />
	<em>Special Allowances:</em></div><hr />
        <strong style="font-size: 14px;">Net:</strong>
</div>
`     
          
