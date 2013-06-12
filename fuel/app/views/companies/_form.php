<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Company name', 'company_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('company_name', Input::post('company_name', isset($company) ? $company->company_name : ''), array('class' => 'span4', 'placeholder'=>'Company name')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('address', Input::post('address', isset($company) ? $company->address : ''), array('class' => 'span4', 'placeholder'=>'Address')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('city', Input::post('city', isset($company) ? $company->city : ''), array('class' => 'span4', 'placeholder'=>'City')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('State', 'state', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('state', Input::post('state', isset($company) ? $company->state : ''), array('class' => 'span4', 'placeholder'=>'State')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Pincode', 'pincode', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('pincode', Input::post('pincode', isset($company) ? $company->pincode : ''), array('class' => 'span4', 'placeholder'=>'Pincode')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('email', Input::post('email', isset($company) ? $company->email : ''), array('class' => 'span4', 'placeholder'=>'Email')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Website', 'website', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('website', Input::post('website', isset($company) ? $company->website : ''), array('class' => 'span4', 'placeholder'=>'Website')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('phone', Input::post('phone', isset($company) ? $company->phone : ''), array('class' => 'span4', 'placeholder'=>'Phone')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Phone1', 'phone1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('phone1', Input::post('phone1', isset($company) ? $company->phone1 : ''), array('class' => 'span4', 'placeholder'=>'Phone1')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>