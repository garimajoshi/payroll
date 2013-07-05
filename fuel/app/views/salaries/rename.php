<div class="headline"><h3>Rename <span class="muted"></span>Fields</h3></div>
<br />
<?php echo Form::open('salaries/renameSubmit', array("class" => "formee well", 'style' => "margin-top:30px;")); ?>
<br/>
<?php foreach ($renames as $rename):
    ?>
    <div class="grid-12-12" style="margin-top:2px;">
        <div class="grid-4-12">
            <?php echo Form::label('Bonus1', 'bonus1'); ?>
            <?php echo Form::input('bonus1', Input::post('bonus1', isset($rename) ? $rename->bonus1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Bonus2', 'bonus2'); ?>
            <?php echo Form::input('bonus2', Input::post('bonus2', isset($rename) ? $rename->bonus2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <?php echo Form::label('Allowance1', 'allowance1'); ?>
            <?php echo Form::input('allowance1', Input::post('allowance1', isset($rename) ? $rename->allowance1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Allowance2', 'allowance2'); ?>
            <?php echo Form::input('allowance2', Input::post('allowance2', isset($rename) ? $rename->allowance2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Allowance3', 'allowance3'); ?>
            <?php echo Form::input('allowance3', Input::post('allowance3', isset($rename) ? $rename->allowance3 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <?php echo Form::label('Deduction1', 'deduction1'); ?>
            <?php echo Form::input('deduction1', Input::post('deduction1', isset($rename) ? $rename->deduction1 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Deduction2', 'deduction2'); ?>
            <?php echo Form::input('deduction2', Input::post('deuduction2', isset($rename) ? $rename->deduction2 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
        <div class="grid-4-12">
            <?php echo Form::label('Deduction3', 'deduction3'); ?>
            <?php echo Form::input('deduction3', Input::post('deduction3', isset($rename) ? $rename->deduction3 : ''), array('class' => 'formee-large', 'required')); ?>
        </div>
    </div>

    <div class="grid-4-12 ">
        <input  class="btn btn-large btn-danger" type='submit'  value="Submit" style="margin-left: 20px;margin-top: 10px;width:100px">
    </div>   
    </div>
<?php endforeach; ?>
<?php echo Form::close(); ?>