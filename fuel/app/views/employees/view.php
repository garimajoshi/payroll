
<div class="view" style='font-size: 14px; line-height: 25px;'>

    <h1 style="font-size: 20px;"><i class="icon-user" style="margin-top:6px; margin-left:10px;"></i> <?php echo $employee->title . '. ' . $employee->first_name . ' ' . $employee->last_name; ?> [<?php echo $employee->id; ?>]</h1> 

    <?php echo Html::anchor('employees', '<< Back', array('class' => 'btn btn-success', 'style' => 'float:right; margin-top:-20px;margin-right:30px;color:#fff;')); ?>
    <hr />
    <div class="main-headline">COMPANY INFORMATION</div>
    <br />
    <div class="grid-12-12">
    	<div class="grid-4-12">
            <strong>Office Location:</strong>
            <?php echo $employee->branch; ?>
        </div>
        <div class="grid-4-12">
            <strong>Joining date:</strong>
            <?php echo $employee->jd_date.'-'.$employee->jd_month.'-'.$employee->jd_year; ?>
        </div>    
        <div class="grid-4-12">
            <strong>Leaving date:</strong>
            <?php echo $employee->leaving_date; ?>
        </div>
    </div>
    <br />
    <div class="main-headline">PERSONAL INFORMATION</div>
    <br />
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>Date of Birth:</strong>
            <?php echo $employee->dob_date.'-'.$employee->dob_month.'-'.$employee->dob_year; ?>
        </div>
        <div class="grid-4-12">
            <strong>Sex:</strong>
            <?php echo $employee->sex; ?>
        </div>
        <div class="grid-4-12">
            <strong >Marital status:</strong>
            <?php echo $employee->marital_status; ?>
        </div>
    </div>
    <br />
    <div class="main-headline">CONTACT INFORMATION</div>
    <br />
    <div class="grid-12-12">
        <div class="grid-6-12">
            <strong>Phone:</strong>
            <?php echo $employee->phone; ?>
        </div>
        <div class="grid-6-12">
            <strong>Email:</strong>
            <?php echo $employee->email; ?>
        </div>    
    </div>
    
    <div class="grid-12-12" style="margin-top:5px;">
        <div class="grid-12-12">
            <strong>Address:</strong>
            <?php echo $employee->address . ', ' . $employee->city . ', ' . $employee->state . ' ' . $employee->pincode; ?>
        </div>
    </div>    
    <br /><br />

    <?php if (isset($employee->bank->employee_id)): ?>
        <div class="main-headline" style="margin-top:13px;">BANK DETAILS </div>
        <br />  

        <div class="grid-12-12">
            <div class="grid-4-12">
                <strong>Account No:</strong>
                <?php echo $employee->bank->account_no; ?>
            </div>
            <div class="grid-4-12">
                <strong>Account Type:</strong>
                <?php echo $employee->bank->account_type; ?>
            </div>
        </div>
        <div class="grid-12-12">
            <div class="grid-4-12">
                <strong>Bank:</strong>
                <?php echo $employee->bank->branch; ?>
            </div>
            <div class="grid-4-12">
                <strong>City:</strong>
                <?php echo $employee->bank->city; ?>
            </div>
            <div class="grid-4-12">
                <strong >State:</strong>
                <?php echo $employee->bank->state; ?>

            </div>
        </div>
        <div class="grid-12-12">
            <div class="grid-4-12">
                <strong>IFSC Code:</strong>

                <?php echo $employee->bank->ifsc_code; ?>

            </div>
            <div class="grid-4-12">
                <strong>Payment Type:</strong>

                <?php
                if ($employee->bank->payment_type == 'cash') {
                    echo 'Cash';
                } elseif ($employee->bank->payment_type == 'dd') {
                    echo 'Demand Draft';
                } elseif ($employee->bank->payment_type == 'cheque') {
                    echo 'Cheque';
                } else {
                    echo 'NEFT';
                }
                ?>

            </div>
        </div>
        <?php
        if ($employee->activity_status == 'active') {
            echo Html::anchor('banks/edit/' . $employee->bank->employee_id, 'Edit Bank', array('class' => 'btn btn-danger', 'style' => 'color: #fff; float:right; margin-right:30px; margin-top:-7px;'));
        } else if ($employee->activity_status == 'inactive') {
            echo Html::anchor('salaries/viewArchive/' . $employee->id, 'View Salary Details', array('class' => 'btn btn-success', 'style' => 'color: #fff; float:right; margin-right:30px; margin-top:-7px;'));
        } else {
            echo Html::anchor('salaries/viewDelete/' . $employee->id, 'View Salary Details', array('class' => 'btn btn-success', 'style' => 'color: #fff; float:right; margin-right:30px; margin-top:-7px;'));
        }
        ?>
        <?php
    else:
        echo Html::anchor('banks/create/' . $employee->id, 'Create Bank', array('class' => 'btn btn-danger', 'style' => 'color:#fff;float:right; margin-right:30px; margin-top:-7px;'));
    endif;
    ?>
</div>