<?php echo Form::open(array("class" => "formee well")); ?>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Html::anchor('leaves','<< Back',array('class'=>'btn btn-large btn-danger', 'style'=>'color:#fff;')); ?>
    </div>
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Type of Leave <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('type', Input::post('type', isset($leave) ? $leave->type : ''), array('sick' => 'Sick Leave', 'vacation' => 'Casual Leave')); ?>

    </div>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Date of Leave <em class="formee-req">*</em>', 'date_of_leave', array('style' => 'font-weight:700;')); ?>
    </div>

    <div class="grid-2-12">
        <?php echo createYears(1920, 2500, 'dol_year', date('Y')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo createMonths('dol_month', date('M')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo createDays('dol_day', date('d')); ?>
    </div></div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('No of hours <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('time', ' ', array('4' => '4', '8' => '8')); ?>

    </div>
</div>

<div class="grid-6-12">
    <div class="grid-4-12 ">
        <?php echo Form::submit('submit', 'Save', array("style" => "margin-top:25px;", "class" => "btn btn-primary")); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::submit('new', 'Add Another Leave', array("style" => "margin-top:25px;", "class" => "btn btn-success")); ?>
    </div>
</div>
<?php echo Form::close(); ?>