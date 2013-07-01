
<div class="view">
<?php echo Html::anchor('banks/edit/'.$employee->bank->employee_id,'Edit',array('class'=>'btn'));?>
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
    <div class="main-headline">BANK DETAILS</div>
    <br />  
     
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>Account No.:</strong>
            <?php if(isset($employee->bank->account_no)):
                echo $employee->bank->account_no;
            else:
                echo '';
            endif;
            ?>
        </div>
        <div class="grid-4-12">
            <strong>Account Type:</strong>
            <?php if(isset($employee->bank->account_type)):
                echo $employee->bank->account_type;
            else:
                echo '';
            endif;
            ?>

        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>Branch:</strong>
                        <?php if(isset($employee->bank->branch)):
                echo $employee->bank->branch;
            else:
                echo '';
            endif;
            ?>

        </div>
        <div class="grid-4-12">
            <strong>City:</strong>
                        <?php if(isset($employee->bank->city)):
                echo $employee->bank->city;
            else:
                echo '';
            endif;
            ?>

        </div>
        <div class="grid-4-12">
            <strong >State:</strong>
                        <?php if(isset($employee->bank->state)):
                echo $employee->bank->state;
            else:
                echo '';
            endif;
            ?>

        </div>
    </div>
    <div class="grid-12-12">
        <div class="grid-4-12">
            <strong>IFSC Code:</strong>
                    <?php if(isset($employee->bank->ifsc_code)):
                echo $employee->bank->ifsc_code;
            else:
                echo '';
            endif;
            ?>
    
        </div>
        <div class="grid-4-12">
            <strong>Payment Type:</strong>
                       <?php if(isset($employee->bank->payment_type)):
                echo $employee->bank->payment_type;
            else:
                echo '';
            endif;
            ?>
      </div>
    </div>
 
</div>