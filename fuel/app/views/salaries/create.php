
<script>
    function doMath() {

        var gross = parseInt(document.getElementById('gross').value);
        var sdxo = parseInt(document.getElementById('sdxo').value);
        var leave = parseInt(document.getElementById('leave').value);
        var bonus1 = parseInt(document.getElementById('bonus1').value);
        var bonus2 = parseInt(document.getElementById('bonus2').value);
        var allowance1 = parseInt(document.getElementById('allowance1').value);
        var allowance2 = parseInt(document.getElementById('allowance2').value);
        var allowance3 = parseInt(document.getElementById('allowance3').value);
        var professional_tax = parseInt(document.getElementById('professional_tax').value);
        var income_tax = parseInt(document.getElementById('income_tax').value);

        var deduction1 = parseInt(document.getElementById('deduction1').value);

        var deduction2 = parseInt(document.getElementById('deduction2').value);
        var deduction3 = parseInt(document.getElementById('deduction3').value);

        var adjust = gross - sdxo;
        var basic_frac = <?php echo $basic; ?>;
        var hra_frac = <?php echo $hra; ?>;
        var lta_frac = <?php echo $lta; ?>;
        var pf_adjust_frac = <?php echo $pf_adjust; ?>;
        var medical = <?php echo $medical; ?>;
        var travel = <?php echo $travel; ?>;
        var pf = <?php echo $pf; ?>;

        var pf_adjust = 0;
        if (document.getElementById('pf_applicable').checked == 1) {
            pf_adjust = adjust / pf_adjust_frac;
        } else {
            pf_adjust = adjust;
        }
        var basic = basic_frac * pf_adjust;
        var hra = hra_frac * pf_adjust;

        var lta = lta_frac * pf_adjust;
        if (document.getElementById('pf_applicable').checked == 1) {
            pf_value = pf * basic;
        } else {
            pf_value = 0.00;
        }
        var special_allowance = pf_adjust - (basic + hra + lta + medical + travel + pf_value);
        var total_credit = basic + hra + lta + medical + travel + pf_value + special_allowance + leave + bonus1 + bonus2 + allowance1 + allowance2 + allowance3;

        var total_debit = professional_tax + income_tax + pf_value + deduction1 + deduction2 + deduction3;

        var net = total_credit - total_debit;

        document.getElementById('basic').innerHTML = basic.toFixed(2);
        document.getElementById('hra').innerHTML = hra.toFixed(2);
        document.getElementById('lta').innerHTML = lta.toFixed(2);
        document.getElementById('special_allowance').innerHTML = special_allowance.toFixed(2);
        document.getElementById('pf_value_debit').innerHTML = pf_value.toFixed(2);
        document.getElementById('pf_value_credit').innerHTML = pf_value.toFixed(2);
        document.getElementById('viewleave').innerHTML = leave;
        document.getElementById('viewbonus1').innerHTML = bonus1;
        document.getElementById('viewbonus2').innerHTML = bonus2;
        document.getElementById('viewallowance1').innerHTML = allowance1;
        document.getElementById('viewallowance2').innerHTML = allowance2;
        document.getElementById('total_credit').innerHTML = total_credit.toFixed(2);
         document.getElementById('total_debit').innerHTML = total_debit.toFixed(2);
        document.getElementById('viewprofessional_tax').innerHTML = professional_tax;
        document.getElementById('viewincome_tax').innerHTML = income_tax;
        document.getElementById('medical').innerHTML = medical;
        document.getElementById('travel').innerHTML = travel;
        document.getElementById('grossctc').innerHTML = gross;
        document.getElementById('adjustedctc').innerHTML = pf_adjust.toFixed(2);
        document.getElementById('net').innerHTML = net.toFixed(2);


    }
</script>

<?php echo render('salaries/_form'); ?>
<div id="previewslip">
    <h3 align="center">SALARY STATEMENT</h3>
    <br />
    <Strong>Name:</strong> <?php
    foreach ($employees as $employee): echo $employee->title . ' ' . $employee->first_name . ' ' . $employee->last_name;
    endforeach;
    ?>

    <div class="debit">
        <span style="font-size: 16px;"><strong>Deductions</strong></span><br />
        <em>Professional Tax: </em><span id="viewprofessional_tax"></span><br />
        <em>PF: </em><span id="pf_value_debit"></span><br />
        <em>Income tax: </em><span id="viewincome_tax"></span><br />
        <em>Deduction1: </em><span id="viewdeduction1"></span><br />
        <em>Deduction2: </em><span id="viewdeduction2"></span><br />
        <em>Special Deduction: </em><span id="viewdeduction3"></span><br />
        <strong>TOTAL DEBIT: </strong><span id="total_debit"></span><br />
    </div>

    <div class="credits">
        <span style="font-size: 16px;"><strong>Credits</strong></span><br />
        <em>Basic: </em> <span id="basic"></span><br />
        <em>HRA: </em><span id="hra"></span><br />
        <em>LTA: </em><span id="lta"></span><br />
        <em>Medical: </em><span id="medical"></span><br />
        <em>Travel: </em><span id="travel"></span><br />
        <em>PF: </em><span id="pf_value_credit"></span><br />
        <em>Leave: </em><span id="viewleave"></span><br />
        <em>Bonus1: </em><span id="viewbonus1"></span><br />
        <em>Bonus2: </em><span id="viewbonus2"></span><br />
        <em>Allowance1: </em><span id="viewallowance1"></span><br />
        <em>Allowance2: </em><span id="viewallowance2"></span><br />
        <em>Special Allowances: </em><span id="special_allowance"></span><br />
        <strong>TOTAL CREDIT: </strong><span id="total_credit"></span><br />
    </div><hr />
    <strong style="font-size: 14px;">Gross CTC: </strong><span id="grossctc"></span><br />
    <strong style="font-size: 14px;">Adjusted CTC: </strong><span id="adjustedctc"></span><br />
    <strong style="font-size: 14px;">NET: </strong><span id="net"></span>
</div>            