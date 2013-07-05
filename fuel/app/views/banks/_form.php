<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-12-12" style="margin-top: 2px;">
    <div class="grid-3-12">
        <?php echo Html::anchor('employees/', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-3-12">
        <?php echo Form::label('Account no <em class="formee-req">*</em>', 'account_no'); ?>
        <?php echo Form::input('account_no', Input::post('account_no', isset($bank) ? $bank->account_no : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Account no')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo Form::label('Account type <em class="formee-req">*</em>', 'account_type'); ?>
        <?php echo Form::select('account_type', Input::post('account_type', isset($bank) ? $bank->account_type : ''), array('saving' => 'Savings','current' => 'Current')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::label('Bank <em class="formee-req">*</em>', 'branch'); ?>
        <?php echo Form::input('branch', Input::post('branch', isset($bank) ? $bank->branch : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Branch')); ?>
    </div>
</div>

<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('City <em class="formee-req">*</em>', 'city'); ?>
        <?php echo Form::input('city', Input::post('city', isset($bank) ? $bank->city : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'City')); ?>
    </div>
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
</div>
<div class="grid-12-12">
    <div class="grid-3-12">
        <?php echo Form::label('IFSC code <em class="formee-req">*</em>', 'ifsc_code'); ?>
        <?php echo Form::input('ifsc_code', Input::post('ifsc_code', isset($bank) ? $bank->ifsc_code : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'IFSC code')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo Form::label('Payment type <em class="formee-req">*</em>', 'payment_type'); ?>
        <?php echo Form::select('payment_type', Input::post('payment_type', isset($bank) ? $bank->payment_type : ''), array('cash' => 'Cash', 'account_transfer' => 'NEFT', 'cheque' => 'Cheque', 'dd' => 'Demand Draft')); ?>
    </div>
    <div class="grid-3-12">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success', "style" => "margin-top:25px;")); ?>
    </div>
</div>


<?php echo Form::close(); ?>