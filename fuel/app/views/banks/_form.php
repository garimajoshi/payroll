<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Employee id', 'employee_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('employee_id', Input::post('employee_id', isset($bank) ? $bank->employee_id : ''), array('class' => 'span4', 'placeholder'=>'Employee id')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Account no', 'account_no', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('account_no', Input::post('account_no', isset($bank) ? $bank->account_no : ''), array('class' => 'span4', 'placeholder'=>'Account no')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Account type', 'account_type', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('account_type', Input::post('account_type', isset($bank) ? $bank->account_type : ''), array('class' => 'span4', 'placeholder'=>'Account type')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Branch', 'branch', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('branch', Input::post('branch', isset($bank) ? $bank->branch : ''), array('class' => 'span4', 'placeholder'=>'Branch')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('city', Input::post('city', isset($bank) ? $bank->city : ''), array('class' => 'span4', 'placeholder'=>'City')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('State', 'state', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('state', Input::post('state', isset($bank) ? $bank->state : ''), array('class' => 'span4', 'placeholder'=>'State')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Ifsc code', 'ifsc_code', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('ifsc_code', Input::post('ifsc_code', isset($bank) ? $bank->ifsc_code : ''), array('class' => 'span4', 'placeholder'=>'Ifsc code')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Payment type', 'payment_type', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('payment_type', Input::post('payment_type', isset($bank) ? $bank->payment_type : ''), array('class' => 'span4', 'placeholder'=>'Payment type')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>