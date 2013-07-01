   <script>
$("form").validate();
</script>

<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:50px;")); ?>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Employee ID <em class="formee-req">*</em>', 'id'); ?>
        <?php echo Form::input('id', Input::post('id', isset($employee) ? $employee->id : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Employee ID')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Branch <em class="formee-req">*</em>', 'branch'); ?>
        <?php echo Form::input('branch', Input::post('branch', isset($employee) ? $employee->branch : ''), array('class' => 'formee-large', 'required')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-2-12">
        <?php echo Form::label('Title <em class="formee-req">*</em>', 'title'); ?>
        <?php
        echo Form::select('title', Input::post('title', isset($employee) ? $employee->title : ''), array(
            'Dr' => 'Dr.',
            'Mr' => 'Mr.',
            'Ms' => 'Miss',
            'Mrs' => 'Mrs.'));
        ?>

    </div>
    <div class="grid-3-12">
        <?php echo Form::label('First Name <em class="formee-req">*</em>', 'first_name'); ?>
        <?php echo Form::input('first_name', Input::post('first_name', isset($employee) ? $employee->first_name : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'First Name')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::label('Last Name <em class="formee-req">*</em>', 'last_name'); ?>
        <?php echo Form::input('last_name', Input::post('last_name', isset($employee) ? $employee->last_name : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Last Name')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Date of Birth <em class="formee-req">*</em>', 'date_of_birth'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'dob_year', date('Y')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths('dob_month', date('M')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('dob_day', date('d')); ?>
        </div></div>
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
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Address <em class="formee-req">*</em>', 'address'); ?>
        <?php echo Form::input('address', Input::post('address', isset($employee) ? $employee->address : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Address')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('City <em class="formee-req">*</em>', 'city'); ?>
        <?php echo Form::input('city', Input::post('city', isset($employee) ? $employee->city : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'City')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('State <em class="formee-req">*</em>', 'state'); ?>
        <select name=state>
            <script language="javascript">
                var states = new Array("Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttaranchal", "Uttar Pradesh", "West Bengal");
                for (var hi = 0; hi < states.length; hi++)
                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
            </script>
        </select>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Pincode <em class="formee-req">*</em>', 'pincode'); ?>
        <?php echo Form::input('pincode', Input::post('pincode', isset($employee) ? $employee->pincode : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Pincode')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Phone No <em class="formee-req">*</em>', 'phone'); ?>
        <?php echo Form::input('phone', Input::post('phone', isset($employee) ? $employee->phone : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Phone No')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Email <em class="formee-req">*</em>', 'email'); ?>
        <?php echo Form::input('email', Input::post('email', isset($employee) ? $employee->email : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Email')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Joining date <em class="formee-req">*</em>', 'joining_date'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'jd_year', date('Y')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths('jd_month', date('M')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('jd_day', date('d')); ?>
        </div>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('Leaving date', 'leaving_date'); ?>
        <div class="grid-3-12">
            <?php echo createYears(1920, 2500, 'ld_year', date('Y')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createMonths('ld_month', date('M')); ?>
        </div>
        <div class="grid-3-12">
            <?php echo createDays('ld_day', date('d')); ?>
        </div>
    </div>
    <div class="grid-3-12 ">
        <?php echo Form::submit('submit', 'Save', array("style" => "margin-top:25px;")); ?>
    </div>
</div>

<?php echo Form::close(); ?>