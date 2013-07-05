<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Html::anchor('leaves', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Type <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('type', Input::post('type', isset($leave) ? $leave->type : ''), array('sick' => 'Sick Leave', 'vacation' => 'Casual Leave')); ?>

    </div>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Time Off <em class="formee-req">*</em>', 'date_of_leave', array('style' => 'font-weight:700;')); ?>
    </div>

    <div class="grid-2-12">
        <?php echo createYears(1920, 2500, 'dol_year', date('Y')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo createMonths('dol_month', date('M')); ?>
    </div>
</div>
<div class="grid-8-12">
    <div class="grid-9-12" style="font-size: 18px">
        <input type="checkbox" name="dol_date[]" value="1" /> 1 &nbsp;
        <input type="checkbox" name="dol_date[]" value="2" /> 2 &nbsp;
        <input type="checkbox" name="dol_date[]" value="3" /> 3 &nbsp;
        <input type="checkbox" name="dol_date[]" value="4" /> 4 &nbsp;
        <input type="checkbox" name="dol_date[]" value="5" /> 5 &nbsp;
        <input type="checkbox" name="dol_date[]" value="6" /> 6 &nbsp;
        <input type="checkbox" name="dol_date[]" value="7" /> 7 &nbsp;
        <input type="checkbox" name="dol_date[]" value="8" /> 8 &nbsp;
        <input type="checkbox" name="dol_date[]" value="9" /> 9 &nbsp;
        <input type="checkbox" name="dol_date[]" value="10" /> 10 <br />
        <input type="checkbox" name="dol_date[]" value="11" /> 11 &nbsp;
        <input type="checkbox" name="dol_date[]" value="12"/> 12 &nbsp;
        <input type="checkbox" name="dol_date[]" value="13" /> 13 &nbsp;
        <input type="checkbox" name="dol_date[]" value="14" /> 14 &nbsp;
        <input type="checkbox" name="dol_date[]" value="15" /> 15 &nbsp;
        <input type="checkbox" name="dol_date[]" value="16" /> 16 &nbsp;
        <input type="checkbox" name="dol_date[]" value="17" /> 17 &nbsp;
        <input type="checkbox" name="dol_date[]" value="18" /> 18 &nbsp;
        <input type="checkbox" name="dol_date[]" value="19" /> 19 &nbsp;
        <input type="checkbox" name="dol_date[]" value="20" /> 20 &nbsp;
        <input type="checkbox" name="dol_date[]" value="21" /> 21 &nbsp;
        <input type="checkbox" name="dol_date[]" value="22" /> 22 &nbsp;
        <input type="checkbox" name="dol_date[]" value="23" /> 23 &nbsp;
        <input type="checkbox" name="dol_date[]" value="24" /> 24 &nbsp;
        <input type="checkbox" name="dol_date[]" value="25" /> 25 &nbsp;
        <input type="checkbox" name="dol_date[]" value="26" /> 26 &nbsp;
        <input type="checkbox" name="dol_date[]" value="27" /> 27 &nbsp;
        <input type="checkbox" name="dol_date[]" value="28" /> 28 &nbsp;
        <input type="checkbox" name="dol_date[]" value="29" /> 29 &nbsp;
        <input type="checkbox" name="dol_date[]" value="30" /> 30 &nbsp;
        <input type="checkbox" name="dol_date[]" value="31" /> 31 
    </div></div>
<div class="grid-8-12">
    <div class="grid-3-12">
        <?php echo Form::label('Hours <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::select('time', ' ', array('8' => '8', '4' => '4')); ?>

    </div>
    <div class="grid-2-12 ">
        <?php echo Form::submit('submit', 'Save', array("class" => "btn btn-primary")); ?>
    </div>

</div>

<?php echo Form::close(); ?>