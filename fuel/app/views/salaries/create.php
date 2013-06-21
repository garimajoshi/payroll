<script>
var month=new Array();
month[0]="January";
month[1]="February";
month[2]="March";
month[3]="April";
month[4]="May";
month[5]="June";
month[6]="July";
month[7]="August";
month[8]="September";
month[9]="October";
month[10]="November";
month[11]="December";

var d = new Date();
x=month[d.getMonth()] +' ' + d.getFullYear();
</script>

<h2>Salary Entry For the Month of <span class='muted'>
<script>
document.write(x);
</script>
</span></h2>

<form style="float:right; margin-top: -29px;">
    <input type="text" class="span3" placeholder="search employee name" style="height: 25px;"> &nbsp;<button class="btn" style="margin-top:-10px;"><i class="icon-search icon-black"></i></button>
</form>
<br />
<br />
<strong>Name: </strong>
i
    <?php echo render('salaries/_form'); ?>

<div id="payslip"> 
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
`         <strong>Gross_CTC:</strong><br />
          <strong>Adjusted_CTC:</strong><br />
          <button class="btn btn-inverse" style="margin-left: 300px; margin-top:-40px;">Preview</button>
          <button class="btn btn-success" style="margin-left:560px;margin-top: -10px;">View Salary Statement</button>
          <button class="btn btn-primary" style="margin-left: 740px; margin-top: -27px">Generate Payslip </button>
          
          <p><?php echo Html::anchor('banks', 'Back'); ?></p>