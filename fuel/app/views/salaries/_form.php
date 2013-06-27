<?php echo Form::open(array("class" => "formee")); ?>


<div class=headline>	
    <div class="grid-12-12">
        <div class="grid-4-12" style="margin-top:-15px; margin-left:-35px;">
            <h3>Salary Entry for the month of</h3></div>

        <div class="grid-2-12" style="margin-top:18px;color:#f00;">
            <?php echo createMonths('month', date('m')); ?>
        </div>
        <div class="grid-2-12" style="margin-top:18px;">
            <?php echo createYears(2000, 2050, 'year', date('Y')); ?>
        </div>
    </div>
</div>
    <div class="grid-4-12">
        <label>PF Applicable</label><input type="checkbox" name="pf_applicable">
        <label>Gross <em class="formee-req">*</em></label> <input type="text" name="gross" required><br>
        <label>SDXO <em class="formee-req">*</em></label> <input type="text" name="sdxo" required><br>
        <label>Leave</label> <input type="text" name="leave"><br>
        <label>Bonus1</label> <input type="text" name="bonus1"><br>
        <label>Bonus2</label> <input type="text" name="bonus2"><br>
        <label>Allowance1</label><input type="text" name="allowance1"><br>
        <label>Allowance2</label> <input type="text" name="allowance2"><br>
        <label>Allowance3</label> <input type="text" name="allowance3"><br>
        <label>Income Tax <em class="formee-req">*</em></label> <input type="text" name="income_tax" required><br>
        <label>Professional Tax <em class="formee-req">*</em></label> <input type="text" name="professional_tax" required><br>
        <label>Deduction1</label> <input type="text" name="deduction1"><br>
        <label>Deduction2</label> <input type="text" name="deduction2"><br>
        <label>Deduction3</label> <input type="text" name="deduction3"><br>
        <br />
        <input type="submit" name="submit" value="submit">
    </div>
    <?php echo Form::close(); ?>
            