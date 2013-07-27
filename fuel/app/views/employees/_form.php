
<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<br/>
<div class="grid-12-12" style="margin-top:-10px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('employees/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>

<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Employee ID <em class="formee-req">*</em>', 'id'); ?>
        <?php echo Form::input('id', Input::post('id', isset($employee) ? $employee->id : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Employee ID')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Office Location <em class="formee-req">*</em>', 'branch'); ?>
        <?php echo Form::input('branch', Input::post('branch', isset($employee) ? $employee->branch : 'Bangalore'), array('class' => 'formee-large', 'required', 'placeholder' => 'Branch')); ?>
    </div>

    <div class="grid-2-12">
        <?php echo Form::label('Title <em class="formee-req">*</em>', 'title'); ?>
        <?php
        echo Form::select('title', Input::post('title', isset($employee) ? $employee->title : ''), array(
            'Dr' => 'Dr.',
            'Mr' => 'Mr.',
            'Ms' => 'Ms.',
            'Mrs' => 'Mrs.'));
        ?>

    </div>
</div>
<div class="grid-12-12">
    
    <div class="grid-4-12">
        <?php echo Form::label('First Name <em class="formee-req">*</em>', 'first_name'); ?>
        <?php echo Form::input('first_name', Input::post('first_name', isset($employee) ? $employee->first_name : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'First Name')); ?>
    </div>
    <div class="grid-3-12" >
        <?php echo Form::label('Last Name <em class="formee-req">*</em>', 'last_name'); ?>
        <?php echo Form::input('last_name', Input::post('last_name', isset($employee) ? $employee->last_name : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Last Name')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Date of Birth <em class="formee-req">*</em>', 'date_of_birth'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'dob_year', Input::post('dob_year',isset($employee)?$employee->dob_year : date('Y'))); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths('dob_month', Input::post('dob_month',isset($employee)?$employee->dob_month : date('M'))); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('dob_day', Input::post('dob_date',isset($employee)?$employee->dob_date : date('d'))); ?>
        </div></div>
</div>
<div class="grid-12-12">
    
    <div class="grid-2-12">
        <?php echo Form::label('Sex <em class="formee-req">*</em>', 'sex'); ?>
        <?php
        echo Form::select('sex', Input::post('sex', isset($employee) ? $employee->sex : ''), array(
            'Male' => 'Male',
            'Female' => 'Female',
        ));
        ?>

    </div>
    <div class="grid-2-12">
        <?php echo Form::label('Marital Status', 'marital_status'); ?>
        <?php
        echo Form::select('marital_status', Input::post('marital_status', isset($employee) ? $employee->marital_status : ''), array(
            'Single' => 'Single',
            'Married' => 'Married',
            'Divorced' => 'Divorced',
            'Widowed' => 'Widowed',
        ));
        ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::label('Address <em class="formee-req">*</em>', 'address'); ?>
        <?php echo Form::input('address', Input::post('address', isset($employee) ? $employee->address : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Address')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::label('City <em class="formee-req">*</em>', 'city'); ?>
        <?php echo Form::input('city', Input::post('city', isset($employee) ? $employee->city : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'City')); ?>
    </div>
</div>

<div class="grid-12-12">
    <div class="grid-3-12">
        <?php echo Form::label('State <em class="formee-req">*</em>', 'state'); ?>
        <?php echo Form::select('state',Input::post('state',isset($employee) ? $employee->state: ''),array(
        "Andaman and Nicobar Islands" => "Andaman and Nicobar Islands",
		"Andhra Pradesh" => "Andhra Pradesh",
        "Arunachal Pradesh" => "Arunachal Pradesh",
        "Assam" => "Assam",
        "Bihar" => "Bihar",
        "Chandigarh" => "Chandigarh",
        "Chattisgarh" => "Chattisgarh",
        "Dadra and Nagar Haveli" => "Dadra and Nagar Haveli",
        "Daman and Diu" => "Daman and Diu",
        "Delhi" => "Delhi",
        "Goa" => "Goa",
        "Gujarat" => "Gujarat",
        "Haryana" => "Haryana",
        "Himachal Pradesh" => "Himachal Pradesh",
        "Jammu and Kashmir" => "Jammu and Kashmir",
        "Jharkhand" => "Jharkhand",
        "Karnataka" => "Karnataka",
        "Kerala" => "Kerala",
        "Lakshadweep" => "Lakshadweep",
        "Madhya Pradesh" => "Madhya Pradesh",
        "Maharashtra" => "Maharashtra",
        "Manipur" => "Manipur",
        "Meghalaya" => "Meghalaya",
        "Mizoram" => "Mizoram",
        "Nagaland" => "Nagaland",
        "Orissa" => "Orissa",
        "Pondicherry" =>"Pondicherry",
        "Punjab" =>"Punjab",
        "Rajasthan" => "Rajasthan",
        "Sikkim" =>"Sikkim",
        "Tamil Nadu" => "Tamil Nadu",
        "Tripura" => "Tripura",
        "Uttaranchal" => "Uttaranchal",
        "Uttar Pradesh" =>"Uttar Pradesh",
        "West Bengal" => "West Bengal",
		)); ?>
            
        
    </div>
    <div class="grid-2-12">
        <?php echo Form::label('Pincode <em class="formee-req">*</em>', 'pincode'); ?>
        <?php echo Form::input('pincode', Input::post('pincode', isset($employee) ? $employee->pincode : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Pincode')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::label('Phone No <em class="formee-req">*</em>', 'phone'); ?>
        <?php echo Form::input('phone', Input::post('phone', isset($employee) ? $employee->phone : ''), array( 'required', 'placeholder' => 'Phone No','style'=>'width:160px;')); ?>
    </div>
    <div class="grid-3-12" style="margin-left:-80px;">
        <?php echo Form::label('Email <em class="formee-req">*</em>', 'email'); ?>
        <?php echo Form::input('email', Input::post('email', isset($employee) ? $employee->email : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Email')); ?>
    </div>
</div>
<div class="grid-12-12">
    
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Joining date <em class="formee-req">*</em>', 'joining_date'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'jd_year',  Input::post('jd_year',isset($employee)?$employee->jd_year : date('Y'))); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths('jd_month',  Input::post('jd_month',isset($employee)?$employee->jd_month : date('M'))); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('jd_day',  Input::post('jd_date',isset($employee)?$employee->jd_date : date('d'))); ?>
        </div>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Leaving date', 'leaving_date'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'ld_year', date('Y')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths1('ld_month',00); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('ld_day'); ?>
        </div>
    </div>
    <div class="grid-4-12 ">
        <input  class="btn btn-success" type='submit'  value="Next >>" style="margin-left: 40px;margin-top: 32px;width:100px">
    </div>   
</div>

<?php echo Form::close(); ?>