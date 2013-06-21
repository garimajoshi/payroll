<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	
		
<div id="form">
		<div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Gross CTC', 'gross', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('gross', Input::post('gross', isset($salary) ? $salary->gross : ''), array('class' => 'span4', 'placeholder'=>'Gross')); ?>
                        </div>
			</div>
		</div>
                
		<div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Sdxo', 'sdxo', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('sdxo', Input::post('sdxo', isset($salary) ? $salary->sdxo : ''), array('class' => 'span4', 'placeholder'=>'Sdxo')); ?>
                        </div>
			</div>
		</div>
            	 <div class="control-group">
                <div class="user input" style="margin-left:-30px; margin-top: -15px; margin-bottom: 10px;">
			<?php echo Form::label('Pf applicable', 'pf_applicable', array('class'=>'control-label')); ?>
                        
			<div class="controls">
			<?php echo Form::checkbox('pf applicable', 'pf_applicable', false); ?>
                        </div>
			</div>
		</div>
        
		
            
            	<div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Bonus1', 'bonus1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('bonus1', Input::post('bonus1', isset($salary) ? $salary->bonus1 : ''), array('class' => 'span4', 'placeholder'=>'Bonus1')); ?>
                        </div>
			</div>
		</div>
                
                <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Bonus2', 'bonus2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('bonus2', Input::post('bonus2', isset($salary) ? $salary->bonus2 : ''), array('class' => 'span4', 'placeholder'=>'Bonus2')); ?>
                        </div>
			</div>
		</div>
                
                <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Allowance1', 'allowance1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('allowance1', Input::post('allowance1', isset($salary) ? $salary->allowance1 : ''), array('class' => 'span4', 'placeholder'=>'Allowance1')); ?>
                        </div>
			</div>
		</div>
            <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Allowance2', 'allowance2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('allowance2', Input::post('allowance2', isset($salary) ? $salary->allowance2 : ''), array('class' => 'span4', 'placeholder'=>'Allowance2')); ?>
                        </div>
			</div>
		</div>
		
            <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Allowance3', 'Allowance3', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('allowance3', Input::post('allowance3', isset($salary) ? $salary->allowance3 : ''), array('class' => 'span4', 'placeholder'=>'allowance3')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Deduction1', 'deduction1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('deduction1', Input::post('deduction1', isset($salary) ? $salary->deduction1 : ''), array('class' => 'span4', 'placeholder'=>'Deduction1')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Deduction2', 'deduction2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('deduction2', Input::post('deduction2', isset($salary) ? $salary->deduction2 : ''), array('class' => 'span4', 'placeholder'=>'Deduction2')); ?>
                        </div>
			</div>
		</div>
                <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Deduction3', 'deduction3', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('deduction3', Input::post('deduction3', isset($salary) ? $salary->deduction3 : ''), array('class' => 'span4', 'placeholder'=>'Deduction3')); ?>
                        </div>
			</div>
		</div>
                <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Professional tax', 'professional_tax', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('professional_tax', Input::post('professional_tax', isset($salary) ? $salary->_tax : ''), array('class' => 'span4', 'placeholder'=>'Professional tax')); ?>
                        </div>
			</div>
		</div>

                <div class="control-group">
                    <div class="userinput">
			<?php echo Form::label('Income tax', 'income_tax', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('income_tax', Input::post('income_tax', isset($salary) ? $salary->income_tax : ''), array('class' => 'span4', 'placeholder'=>'Income tax')); ?>
                        </div>
			</div>
            </div><hr />
</div>
		
	
<?php echo Form::close(); ?>
