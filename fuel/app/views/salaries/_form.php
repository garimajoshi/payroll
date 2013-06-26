<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	
		

    <h2>Salary Entry For the Month of 
<?php echo createMonths('start_month', date('m')); ?> <?php echo createYears(2000, 2020, 'start_year', date('Y')); ?>
</h2>

            
            Lock: <input type="text" name="lock" value="lock"><br>
            PF: <input type="text" name="pf_applicable" value="pf_applicable"><br>
           
            Gross: <input type="text" name="gross" value="gross"><br>
            SDXO: <input type="text" name="sdxo" value="sdxo"><br>
            pf_adjust: <input type="text" name="pf_adjust" value="pf_adjus"><br>
            basic: <input type="text" name="basic" value="basic"><br>
            hra: <input type="text" name="hra" value="hra"><br>
            lta: <input type="text" name="lta" value="lta"><br>
            medical: <input type="text" name="medical" value="medical"><br>
            travel: <input type="text" name="travel" value="travel"><br>
            pf_value: <input type="text" name="pf_value" value="pf_value"><br>
            credit_other: <input type="text" name="credit_other" value="credit_other"><br>
            bonus1: <input type="text" name="bonus1" value="bonus1"><br>
            bonus2: <input type="text" name="bonus2" value="bonus2"><br>
            allowance1: <input type="text" name="allowance1" value="allowance1"><br>
	leave: <input type="text" name="leave" value="leave"><br>
            allowance2: <input type="text" name="allowance2" value="allowance2"><br>
            allowance3: <input type="text" name="allowance3" value="allowance3"><br>
            credit_total: <input type="text" name="credit_total" value="credit_total"><br>
            income_tax: <input type="text" name="income_tax" value="income_tax"><br>
            professional_Tax: <input type="text" name="professional_tax" value="professional_tax"><br>
            deduction1: <input type="text" name="deduction1" value="deduction1"><br>
            deduction2: <input type="text" name="deduction2" value="deduction2"><br>
            deduction3: <input type="text" name="deduction3" value="deduction3"><br>
            total_debit: <input type="text" name="total_debit" value="total_debit"><br>
            net: <input type="text" name="net" value="net"><br>
            <input type="submit" name="submit" value="submit">
            <?php echo Form::close(); ?>
      