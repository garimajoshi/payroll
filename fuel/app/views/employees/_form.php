<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('name', Input::post('name', isset($employee) ? $employee->name : ''), array('class' => 'span4', 'placeholder'=>'Name')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('phone', Input::post('phone', isset($employee) ? $employee->phone : ''), array('class' => 'span4', 'placeholder'=>'Phone')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('address', Input::post('address', isset($employee) ? $employee->address : ''), array('class' => 'span4', 'placeholder'=>'Address')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('city', Input::post('city', isset($employee) ? $employee->city : ''), array('class' => 'span4', 'placeholder'=>'City')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('State', 'state', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('state', Input::post('state', isset($employee) ? $employee->state : ''), array('class' => 'span4', 'placeholder'=>'State')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pincode', 'pincode', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pincode', Input::post('pincode', isset($employee) ? $employee->pincode : ''), array('class' => 'span4', 'placeholder'=>'Pincode')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('email', Input::post('email', isset($employee) ? $employee->email : ''), array('class' => 'span4', 'placeholder'=>'Email')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Joining date', 'joining_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('joining_date', Input::post('joining_date', isset($employee) ? $employee->joining_date : ''), array('class' => 'span4', 'placeholder'=>'Joining date')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Leaving date', 'leaving_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('leaving_date', Input::post('leaving_date', isset($employee) ? $employee->leaving_date : ''), array('class' => 'span4', 'placeholder'=>'Leaving date')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Date of birth', 'date_of_birth', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($employee) ? $employee->date_of_birth : ''), array('class' => 'span4', 'placeholder'=>'Date of birth')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Sex', 'sex', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('sex', Input::post('sex', isset($employee) ? $employee->sex : ''), array('class' => 'span4', 'placeholder'=>'Sex')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Marital status', 'marital_status', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('marital_status', Input::post('marital_status', isset($employee) ? $employee->marital_status : ''), array('class' => 'span4', 'placeholder'=>'Marital status')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Activity status', 'activity_status', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('activity_status', Input::post('activity_status', isset($employee) ? $employee->activity_status : ''), array('class' => 'span4', 'placeholder'=>'Activity status')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>