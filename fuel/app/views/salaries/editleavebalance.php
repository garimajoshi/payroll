
<div class=headline>	
            <h3>Add Leave Balance for</h3></div>

<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-8-12" style="margin-top:2px;">
    <div class="grid-4-12">
        <?php echo Html::anchor('salaries/view/'.$balance->employee_id.'/'.$balance->month.'/'.$balance->year,'<< Back',array('class'=>'btn btn-success','style'=>'color:#fff;')); ?>
         </div>
    
</div>
<div class="grid-6-12" style="margin-top:2px;">
    <div class="grid-4-12">
        <?php echo Form::label('Sick Days Balance','sick_balance'); ?>
         </div>
    <div class="grid-4-12">
        <?php echo Form::input('sick_balance',Input::post('sick_balance', isset($balance) ? $balance->sick_balance : '0'),array('class'=>'formee-large')); ?>
    </div>
</div>
<div class="grid-6-12" style="margin-top:2px;">
    <div class="grid-4-12">
        <?php echo Form::label('Vacation Balance','vacation_balance'); ?>
         </div>
    <div class="grid-4-12">
        <?php echo Form::input('vacation_balance',Input::post('vacation_balance', isset($balance) ? $balance->vacation_balance : '0'),array('class'=>'formee-large')); ?>
    </div>
</div>

<div class="grid-4-12">
    <?php echo Form::submit('submit', 'Save', array("style" => "margin-top:10px;",'class'=>"btn btn-primary")); ?>
</div>
<?php echo Form::close(); ?>
