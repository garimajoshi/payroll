<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
            
                <div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Employee ID', 'employee_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('employee_id', Input::post('employee_id', isset($employee) ? $employee->id : ''), array('class' => 'span4', 'placeholder'=>'Employee ID')); ?>
                        </div>
			</div>
		</div>
                <div class="control-group">
                    <div class="even">
			<?php echo Form::label('Branch', 'branch', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('branch', Input::post('branch', isset($employee) ? $employee->branch : ''), array('class' => 'span4', 'placeholder'=>'Branch')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('First Name', 'first_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('first_name', Input::post('first_name', isset($employee) ? $employee->first_name : ''), array('class' => 'span4', 'placeholder'=>'First Name')); ?>
                        </div>
			</div>
		</div>
                <div class="control-group">
                    <div class="even">
			<?php echo Form::label('Last Name', 'last_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('last_name', Input::post('last_name', isset($employee) ? $employee->last_name : ''), array('class' => 'span4', 'placeholder'=>'Last Name')); ?>
                        </div>
			</div>
		</div>
                <div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Date of birth', 'date_of_birth', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($employee) ? $employee->date_of_birth : ''), array('class' => 'span4', 'placeholder'=>'Date of birth')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="even">
			<?php echo Form::label('Sex', 'sex', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::select('sex', 'none', array(
    'Male' => 'Male',
    'Female' => 'Female',
)); ?>

			</div></div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Marital status', 'marital_status', array('class'=>'control-label')); ?>

			<div class="controls">
			<?php echo Form::select('marital_status', 'none', array(
    'Single' => 'Single',
    'Married' => 'Married',
        'Divorced' => 'Divorced',
        'Widowed' => 'Widowed',
)); ?>

			</div></div>
		</div>
		<div class="control-group">
                    <div class="even">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('phone', Input::post('phone', isset($employee) ? $employee->phone : ''), array('class' => 'span4', 'placeholder'=>'Phone')); ?>

			</div></div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('address', Input::post('address', isset($employee) ? $employee->address : ''), array('class' => 'span4', 'placeholder'=>'Address')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="even">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('city', Input::post('city', isset($employee) ? $employee->city : ''), array('class' => 'span4', 'placeholder'=>'City')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('State', 'state', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('state', Input::post('state', isset($employee) ? $employee->state : ''), array('class' => 'span4', 'placeholder'=>'State')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="even">
			<?php echo Form::label('Pincode', 'pincode', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pincode', Input::post('pincode', isset($employee) ? $employee->pincode : ''), array('class' => 'span4', 'placeholder'=>'Pincode')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('email', Input::post('email', isset($employee) ? $employee->email : ''), array('class' => 'span4', 'placeholder'=>'Email')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="even">
			<?php echo Form::label('Joining date', 'joining_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('joining_date', Input::post('joining_date', isset($employee) ? $employee->joining_date : ''), array('class' => 'span4', 'placeholder'=>'Joining date')); ?>
                        </div>
			</div>
		</div>
		<div class="control-group">
                    <div class="odd">
			<?php echo Form::label('Leaving date', 'leaving_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('leaving_date', Input::post('leaving_date', isset($employee) ? $employee->leaving_date : ''), array('class' => 'span4', 'placeholder'=>'Leaving date')); ?>
                        </div>
			</div>
		</div>
		
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>