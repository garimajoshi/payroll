
<div class="view" style='font-size: 16px; line-height: 25px;'>
    <h2><i class="icon-user" style="margin-top:6px; margin-left:10px;"></i> <?php echo $employee->title . '. ' . $employee->first_name . ' ' . $employee->last_name; ?> [<?php echo $employee->id; ?>]</h2>
    <hr />
    <div class="main-headline">COMPANY INFORMATION</div>
    <br />
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>Joining date:</strong>
            <?php echo $employee->joining_date; ?>
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
            <?php echo $employee->date_of_birth; ?>
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
        <div class="grid-4-12">
            <strong>Phone:</strong>
            <?php echo $employee->phone; ?>
        </div>
        <div class="grid-4-12">
            <strong>Email:</strong>
            <?php echo $employee->email; ?>
        </div>    
    </div>
    <div class="grid-12-12">
        <div class="grid-6-12">
            <strong>Address:</strong>
            <?php echo $employee->address . ', ' . $employee->city . ', ' . $employee->state . '-' . $employee->pincode; ?>
        </div>
    </div>    
    <br /><br />

    <?php if (isset($employee->bank->employee_id)): ?>
        <div class="main-headline">BANK DETAILS </div>
        <br />  

        <div class="grid-12-12">
            <div class="grid-4-12">
                <strong>Account No.:</strong>
                <?php echo $employee->bank->account_no; ?>
            </div>
            <div class="grid-4-12">
                <strong>Account Type:</strong>
                <?php echo $employee->bank->account_type; ?>
            </div>
        </div>
        <div class="grid-12-12">
            <div class="grid-4-12">
                <strong>Branch:</strong>
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
                    echo 'Account Transfer';
                }
                ?>

            </div>
        </div>
        <?php echo Html::anchor('banks/edit/' . $employee->id, 'Edit Bank', array('class' => 'btn', 'style' => 'float:right; margin-right:30px; margin-top:-7px;')); ?>
    <?php
    else:
        echo Html::anchor('banks/create/' . $employee->id, 'Create Bank', array('class' => 'btn', 'style' => 'float:right; margin-right:30px; margin-top:-7px;'));
    endif;
    ?>
</div>