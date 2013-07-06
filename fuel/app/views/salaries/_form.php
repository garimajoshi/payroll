<?php echo Form::open(array("class" => "formee" )); ?>
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
<div style="margin-top:15px; margin-left:30px; width:1050px;" class="well">
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Gross <em class="formee-req">*</em>', 'gross'); ?>
        <?php echo Form::input('gross', Input::post('gross', isset($employee) ? $employee->gross : '0'), array('id' => 'gross', 'class' => 'formee-large', 'required', 'placeholder' => 'Gross')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Sodexo <em class="formee-req">*</em>', 'sdxo'); ?>
        <?php echo Form::input('sdxo', Input::post('sdxo', isset($employee) ? $employee->sdxo : '0'), array('id' => 'sdxo', 'class' => 'formee-large', 'required', 'placeholder' => 'Sodexo')); ?>
    </div>
</div>

<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <label>PF Applicable:</label> <input type="checkbox" name ="pf_applicable" id="pf_applicable" style ="margin-left:100px; margin-top:-20px;" />
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Leave', 'leave'); ?>
        <?php echo Form::input('leave', Input::post('leave', isset($employee) ? $employee->leave : '0'), array('id' => 'leave', 'class' => 'formee-large', 'required', 'placeholder' => 'Leave')); ?>
    </div>
</div>   
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Bonus #1', 'bonus1'); ?>
        <?php echo Form::input('bonus1', Input::post('bonus1', isset($employee) ? $employee->bonus1 : '0'), array('id' => 'bonus1', 'class' => 'formee-large', 'required', 'placeholder' => 'Bonus #1')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Bonus #2', 'bonus2'); ?>
        <?php echo Form::input('bonus2', Input::post('bonus2', isset($employee) ? $employee->bonus2 : '0'), array('id' => 'bonus2', 'class' => 'formee-large', 'required', 'placeholder' => 'Bonus #2')); ?>
    </div>
</div>
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Allowance #1', 'allowance1'); ?>
        <?php echo Form::input('allowance1', Input::post('allowance1', isset($employee) ? $employee->allowance1 : '0'), array('id' => 'allowance1', 'class' => 'formee-large', 'required', 'placeholder' => 'Allowance #1')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Allowance #2', 'allowance2'); ?>
        <?php echo Form::input('allowance2', Input::post('allowance2', isset($employee) ? $employee->allowance2 : '0'), array('id' => 'allowance2', 'class' => 'formee-large', 'required', 'placeholder' => 'Allowance #2')); ?>
    </div>
</div>
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Allowance #3', 'allowance3'); ?>
        <?php echo Form::input('allowance3', Input::post('allowance3', isset($employee) ? $employee->allowance3 : '0'), array('id' => 'allowance3', 'class' => 'formee-large', 'required', 'placeholder' => 'Allowance #3')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Professional Tax <em class="formee-req">*</em>', 'professional_tax'); ?>
        <?php echo Form::input('professional_tax', Input::post('professional_tax', isset($employee) ? $employee->professional_tax : '0'), array('id' => 'professional_tax', 'class' => 'formee-large', 'required', 'placeholder' => 'Professional Tax')); ?>
    </div>
</div>
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Income_tax <em class="formee-req">*</em>', 'income_tax'); ?>
        <?php echo Form::input('income_tax', Input::post('income_tax', isset($employee) ? $employee->income_tax : '0'), array('id' => 'income_tax', 'class' => 'formee-large', 'required', 'placeholder' => 'Income Tax')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Deduction #1', 'deduction1'); ?>
        <?php echo Form::input('deduction1', Input::post('deduction1', isset($employee) ? $employee->deduction1 : '0'), array('id' => 'deduction1', 'class' => 'formee-large', 'required', 'placeholder' => 'Deduction #1')); ?>
    </div>
</div>
<div class="grid-7-12" style="margin-top:-25px;">
    <div class="grid-4-12">
        <?php echo Form::label('Deduction #2', 'deduction2'); ?>
        <?php echo Form::input('deduction2', Input::post('deduction2', isset($employee) ? $employee->deduction2 : '0'), array('id' => 'deduction2', 'class' => 'formee-large', 'required', 'placeholder' => 'Deduction #2')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Deduction #3', 'deduction3'); ?>
        <?php echo Form::input('deduction3', Input::post('deduction3', isset($employee) ? $employee->deduction3 : '0'), array('id' => 'deduction3', 'class' => 'formee-large', 'required', 'placeholder' => 'Deduction #3')); ?>
    </div>
</div>
<input type="button" value="Preview" onclick="doMath();" style="margin-top: 10px;" class="btn btn-success"/>
<?php echo Form::submit('submit', 'Save', array("style" => "margin-top:10px;", 'class' => "btn btn-primary")); ?>

</div>
<?php echo Form::close(); ?>
