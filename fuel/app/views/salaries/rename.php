<div class="headline"><h3>Rename <span class="muted">Salary Fields</span></h3></div>
<br />
<?php echo Form::open('salaries/renameSubmit', array("class" => "formee well", 'style' => "margin-top:30px;")); ?>
<br/>
<div class="formee well" style="margin-top:20px; margin-left:30px; width:1100px;">
<?php foreach ($renames as $rename):
    ?>
    <div class="grid-12-12" style="margin-top:2px;">
        <div class="grid-4-12">
            <?php echo Form::label('Bonus #1', 'bonus1'); ?>
            <?php echo Form::input('bonus1', Input::post('bonus1', isset($rename) ? $rename->bonus1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Bonus #2', 'bonus2'); ?>
            <?php echo Form::input('bonus2', Input::post('bonus2', isset($rename) ? $rename->bonus2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <?php echo Form::label('Allowance #1', 'allowance1'); ?>
            <?php echo Form::input('allowance1', Input::post('allowance1', isset($rename) ? $rename->allowance1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Allowance #2', 'allowance2'); ?>
            <?php echo Form::input('allowance2', Input::post('allowance2', isset($rename) ? $rename->allowance2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Allowance #3', 'allowance3'); ?>
            <?php echo Form::input('allowance3', Input::post('allowance3', isset($rename) ? $rename->allowance3 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <?php echo Form::label('Deduction #1', 'deduction1'); ?>
            <?php echo Form::input('deduction1', Input::post('deduction1', isset($rename) ? $rename->deduction1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Deduction #2', 'deduction2'); ?>
            <?php echo Form::input('deduction2', Input::post('deuduction2', isset($rename) ? $rename->deduction2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Deduction #3', 'deduction3'); ?>
            <?php echo Form::input('deduction3', Input::post('deduction3', isset($rename) ? $rename->deduction3 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>

    <div class="grid-4-12 ">
        <input  class="btn btn-large btn-danger" type='submit'  value="Submit" style="margin-left: 20px;margin-top: 10px;width:100px">
    </div>   
    
<?php endforeach; ?>
</div>
<?php echo Form::close(); ?>