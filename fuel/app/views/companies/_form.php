<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>

<div class="grid-12-12">
    <div class="grid-3-12">
        <?php echo Html::anchor('companies', '<< Back', array('class' => 'btn btn-danger', 'style' => ' margin-top:25px; color:#fff')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Company Address <em class="formee-req">*</em>'); ?>
        <?php echo Form::input('address', Input::post('address', isset($company) ? $company->address : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Address')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::label('City <em class="formee-req">*</em>', 'city'); ?>
        <?php echo Form::input('city', Input::post('city', isset($company) ? $company->city : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'City')); ?>
    </div>
</div>



<div class="grid-12-12">
    <div class="grid-3-12">
        <?php echo Form::label('Country <em class="formee-req">*</em>', 'country'); ?>
        <select onchange="print_state('state', this.selectedIndex);" id="country" name ="country"></select>

    </div>

    <div class="grid-3-12">
        <?php echo Form::label('State <em class="formee-req">*</em>', 'state'); ?>

        <select name ="state" id ="state"></select>
        <script language="javascript">print_country("country");</script>	
    </div>

    <div class="grid-2-12">
        <?php echo Form::label('Pincode <em class="formee-req">*</em>', 'pincode'); ?>
        <?php echo Form::input('pincode', Input::post('pincode', isset($company) ? $company->pincode : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Pincode')); ?>

    </div>
</div>

<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Email <em class="formee-req">*</em>', 'email'); ?>

        <?php echo Form::input('email', Input::post('email', isset($company) ? $company->email : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Email')); ?>

    </div>

    <div class="grid-4-12">
        <?php echo Form::label('Website <em class="formee-req">*</em>', 'website'); ?>
        <?php echo Form::input('website', Input::post('website', isset($company) ? $company->website : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Website')); ?>

    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Phone <em class="formee-req">*</em>', 'phone'); ?>
        <?php echo Form::input('phone', Input::post('phone', isset($company) ? $company->phone : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Phone')); ?>

    </div>

    <div class="grid-4-12">
        <?php echo Form::label('FAX <em class="formee-req">*</em>', 'fax'); ?>

        <?php echo Form::input('fax', Input::post('fax', isset($company) ? $company->fax : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'fax')); ?>

    </div>
</div>
<div class='grid-4-12'>
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success','style'=>'margin-left:20px;')); ?>
</div>

<?php echo Form::close(); ?>