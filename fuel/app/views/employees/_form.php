<?php echo Form::open(array("class"=>"formee",'style'=>"margin-top:50px;")); ?>

	
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('Employee ID <em class="formee-req">*</em>', 'id');?>
                    <?php echo Form::input('id',Input::post('id',isset($employee) ? $employee->id : ''), array('class'=>'formee-large','required', 'placeholder' =>'Employee ID')); ?>
                </div>
                <div class="grid-4-12">
                    <?php echo Form::label('Branch <em class="formee-req">*</em>', 'branch');?>
                    <?php echo Form::input('branch',Input::post('branch',isset($employee) ? $employee->branch : ''), array('class'=>'formee-large','required', 'placeholder' =>'Branch')); ?>
                </div>
            </div>
             <div class="grid-12-12">
                <div class="grid-1-12">
                    <?php echo Form::label('Title <em class="formee-req">*</em>', 'title');?>
                    <?php echo Form::select('title',Input::post('title',isset($employee) ? $employee->title : ''), array(
                                'dr'=>'Dr',
                                'mr'=>'Mr',
                                'ms'=>'Ms',
                                'mrs'=>'Mrs'));?>
                    
                </div>
                <div class="grid-3-12">
                    <?php echo Form::label('First Name <em class="formee-req">*</em>', 'first_name');?>
                    <?php echo Form::input('first_name',Input::post('first_name',isset($employee) ? $employee->first_name : ''), array('class'=>'formee-large','required', 'placeholder' =>'First Name')); ?>
                </div>
                 <div class="grid-4-12">
                    <?php echo Form::label('Last Name <em class="formee-req">*</em>', 'last_name');?>
                    <?php echo Form::input('last_name',Input::post('last_name',isset($employee) ? $employee->last_name : ''), array('class'=>'formee-large','required', 'placeholder' =>'Last Name')); ?>
                </div>
            </div>
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('Date of Birth <em class="formee-req">*</em>', 'date_of_birth');?>
                   <?php echo createYears(2000, 2020, 'start_year', 2010); ?>
                    <?php echo createMonths('start_month', 4); ?>
                    <?php echo createDays('start_day', 20); ?>
                </div>
                <div class="grid-2-12">
                    <?php echo Form::label('Sex <em class="formee-req">*</em>', 'sex');?>
                    <?php echo Form::select('sex',Input::post('sex',isset($employee) ? $employee->sex : ''), array(
                                'male'=>'Male',
                                'female'=>'Female',
                            ));?>
                    
                </div>
                <div class="grid-2-12">
                    <?php echo Form::label('Marital Status', 'marital_status');?>
                    <?php echo Form::select('marital_status',Input::post('marital_status',isset($employee) ? $employee->marital_status : ''), array(
                                'single'=>'Single',
                                'married'=>'Married',
                                'divorced'=>'Divorced',
                                'widowed'=>'Widowed',
                            )); ?>
                </div>
            </div>
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('Address <em class="formee-req">*</em>', 'address');?>
                    <?php echo Form::input('address',Input::post('address',isset($employee) ? $employee->address : ''), array('class'=>'formee-large','required', 'placeholder' =>'Address')); ?>
                </div>
                <div class="grid-4-12">
                    <?php echo Form::label('City <em class="formee-req">*</em>', 'city');?>
                    <?php echo Form::input('city',Input::post('city',isset($employee) ? $employee->city : ''), array('class'=>'formee-large','required', 'placeholder' =>'City')); ?>
                </div>
            </div>
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('State <em class="formee-req">*</em>', 'state');?>
                      <?php echo Form::input('state',Input::post('state',isset($employee) ? $employee->state : ''), array('class'=>'formee-large','required', 'placeholder' =>'state')); ?>
<!--<select name=state>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select>-->
                </div>
                <div class="grid-4-12">
                    <?php echo Form::label('Pincode <em class="formee-req">*</em>', 'pincode');?>
                    <?php echo Form::input('pincode',Input::post('pincode',isset($employee) ? $employee->pincode : ''), array('class'=>'formee-large','required', 'placeholder' =>'Pincode')); ?>
                </div>
            </div>
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('Phone No <em class="formee-req">*</em>', 'phone');?>
                    <?php echo Form::input('phone',Input::post('phone',isset($employee) ? $employee->phone : ''), array('class'=>'formee-large','required', 'placeholder' =>'Phone No')); ?>
                </div>
                <div class="grid-4-12">
                    <?php echo Form::label('Email <em class="formee-req">*</em>', 'email');?>
                    <?php echo Form::input('email',Input::post('email',isset($employee) ? $employee->email : ''), array('class'=>'formee-large','required', 'placeholder' =>'Email')); ?>
                </div>
            </div>
            <div class="grid-12-12">
                <div class="grid-4-12">
                    <?php echo Form::label('Joining date <em class="formee-req">*</em>', 'joining_date');?>
                    <?php echo Form::input('joining_date',Input::post('joining_date',isset($employee) ? $employee->joining_date : ''), array('class'=>'formee-large','required', 'placeholder' =>'joining_date')); ?>
                </div>
                 <div class="grid-4-12">
                    <?php echo Form::label('Leaving date', 'leaving_date');?>
                    <?php echo Form::input('leaving_date',Input::post('leaving_date',isset($employee) ? $employee->leaving_date : ''), array('class'=>'formee-large','required', 'placeholder' =>'leaving_date')); ?>
                  </div>
                  <div class="grid-3-12 ">
                        <?php  echo Form::submit('submit', 'Save',array("style"=>"margin-top:25px;")); 
//echo Form::submit('submit', 'Add Bank Details', array('class' => 'formee-button', 'style'=>'margin-top:20px;'));?>
            </div>
            </div>
            
<?php echo Form::close(); ?>