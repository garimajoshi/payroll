<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Employee id', 'employee_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('employee_id', Input::post('employee_id', isset($salary) ? $salary->employee_id : ''), array('class' => 'span4', 'placeholder'=>'Employee id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Month', 'month', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('month', Input::post('month', isset($salary) ? $salary->month : ''), array('class' => 'span4', 'placeholder'=>'Month')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('year', Input::post('year', isset($salary) ? $salary->year : ''), array('class' => 'span4', 'placeholder'=>'Year')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf applicable', 'pf_applicable', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_applicable', Input::post('pf_applicable', isset($salary) ? $salary->pf_applicable : ''), array('class' => 'span4', 'placeholder'=>'Pf applicable')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf date', 'pf_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_date', Input::post('pf_date', isset($salary) ? $salary->pf_date : ''), array('class' => 'span4', 'placeholder'=>'Pf date')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf scheme', 'pf_scheme', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_scheme', Input::post('pf_scheme', isset($salary) ? $salary->pf_scheme : ''), array('class' => 'span4', 'placeholder'=>'Pf scheme')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf number', 'pf_number', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_number', Input::post('pf_number', isset($salary) ? $salary->pf_number : ''), array('class' => 'span4', 'placeholder'=>'Pf number')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Gross', 'gross', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('gross', Input::post('gross', isset($salary) ? $salary->gross : ''), array('class' => 'span4', 'placeholder'=>'Gross')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Sdxo', 'sdxo', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('sdxo', Input::post('sdxo', isset($salary) ? $salary->sdxo : ''), array('class' => 'span4', 'placeholder'=>'Sdxo')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf adjust', 'pf_adjust', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_adjust', Input::post('pf_adjust', isset($salary) ? $salary->pf_adjust : ''), array('class' => 'span4', 'placeholder'=>'Pf adjust')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Basic', 'basic', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('basic', Input::post('basic', isset($salary) ? $salary->basic : ''), array('class' => 'span4', 'placeholder'=>'Basic')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Hra', 'hra', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('hra', Input::post('hra', isset($salary) ? $salary->hra : ''), array('class' => 'span4', 'placeholder'=>'Hra')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Lta', 'lta', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('lta', Input::post('lta', isset($salary) ? $salary->lta : ''), array('class' => 'span4', 'placeholder'=>'Lta')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Medical', 'medical', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('medical', Input::post('medical', isset($salary) ? $salary->medical : ''), array('class' => 'span4', 'placeholder'=>'Medical')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Travel', 'travel', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('travel', Input::post('travel', isset($salary) ? $salary->travel : ''), array('class' => 'span4', 'placeholder'=>'Travel')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pf value', 'pf_value', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pf_value', Input::post('pf_value', isset($salary) ? $salary->pf_value : ''), array('class' => 'span4', 'placeholder'=>'Pf value')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Credit other', 'credit_other', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('credit_other', Input::post('credit_other', isset($salary) ? $salary->credit_other : ''), array('class' => 'span4', 'placeholder'=>'Credit other')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Bonus1', 'bonus1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('bonus1', Input::post('bonus1', isset($salary) ? $salary->bonus1 : ''), array('class' => 'span4', 'placeholder'=>'Bonus1')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Bonus2', 'bonus2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('bonus2', Input::post('bonus2', isset($salary) ? $salary->bonus2 : ''), array('class' => 'span4', 'placeholder'=>'Bonus2')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Bonus3', 'bonus3', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('bonus3', Input::post('bonus3', isset($salary) ? $salary->bonus3 : ''), array('class' => 'span4', 'placeholder'=>'Bonus3')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Leave', 'leave', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('leave', Input::post('leave', isset($salary) ? $salary->leave : ''), array('class' => 'span4', 'placeholder'=>'Leave')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Misc1', 'misc1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('misc1', Input::post('misc1', isset($salary) ? $salary->misc1 : ''), array('class' => 'span4', 'placeholder'=>'Misc1')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Misc2', 'misc2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('misc2', Input::post('misc2', isset($salary) ? $salary->misc2 : ''), array('class' => 'span4', 'placeholder'=>'Misc2')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Misc3', 'misc3', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('misc3', Input::post('misc3', isset($salary) ? $salary->misc3 : ''), array('class' => 'span4', 'placeholder'=>'Misc3')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Income tax', 'income_tax', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('income_tax', Input::post('income_tax', isset($salary) ? $salary->income_tax : ''), array('class' => 'span4', 'placeholder'=>'Income tax')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Net', 'net', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('net', Input::post('net', isset($salary) ? $salary->net : ''), array('class' => 'span4', 'placeholder'=>'Net')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>