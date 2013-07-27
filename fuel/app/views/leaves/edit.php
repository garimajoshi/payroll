<div class="headline"><h3><?php echo 'Date: '?><span class='muted'><?php echo $leave->date_of_leave; ?></span></h3></div>
<br>

<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-8-12">
    <div class="grid-4-12 ">
        <?php echo Html::anchor('leaves/view/'.$leave->employee->id, '<< Back', array("style" => "margin-top:25px;", "class" => "btn btn-danger", 'style'=>'color:#fff;')); ?>
    </div>
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Type of Leave <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('type', Input::post('type', isset($leave) ? $leave->type : ''), array('sick' => 'Sick', 'vacation' => 'Vacation')); ?>

    </div>
</div>


<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('No of hours <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('time', Input::post('type', isset($leave) ? $leave->type : ''), array('8' => '8', '4' => '4')); ?>

    </div>
</div>

<div class="grid-6-12">
    <div class="grid-4-12 ">
        <?php echo Form::submit('submit', 'Save', array("style" => "", "class" => "btn btn-success")); ?>
    </div>

</div>
<?php echo Form::close(); ?>