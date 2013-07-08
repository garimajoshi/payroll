<div class='headline'><h3>Change <span class='muted'>Password</span></h3></div>
<br />
<?php if (Session::get_flash('error')): ?>
                <div class="alert alert-error">
                    <strong>Error</strong>
                    
                </div>
            <?php endif; ?>
<?php echo Form::open(array('class' => 'formee well',  'style' => "margin-top:20px; margin-left:30px; width:1100px;",'id' => 'loginForm', 'name' => 'loginForm')); ?>	

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Username :', 'username'); ?>
    </div> 
    <div class="grid-4-12" style='margin-top:8px;'>
        <?php if ($user = Session::get('user')) { ?>
            <span class='username'> <?php echo $user->name; ?></span>
            <?php
        } else {
            Response::redirect('login/login');
        }
        ?>

    </div>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Old Password <em class="formee-req">*</em>', 'old_password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::password('old_password', '', array('class' => 'formee-large', 'required', 'placeholder' => 'Old Password')); ?>
    </div>  
                

</div>
<div class='grid-8-12'>
    <div class='grid-4-12'>
        <?php echo Form::label('New Password <em class="formee-req">*</em>', 'password'); ?>
    </div>
    <div class='grid-4-12'>
        <input type="password" name="password" id="password" required placeholder="New Password"/>
    </div></div>
<div class='grid-8-12'>
    <div class='grid-4-12'>
        <?php echo Form::label('Confirm Password <em class="formee-req">*</em>', 'confirmpassword'); ?>
    </div>			
    <div class='grid-4-12'>
        <input type="password" name="confirmpassword" id="confirmpassword" required placeholder="Confirm Password"/>
    </div>		
</div>
<div class='grid-8-12'>
    <div class='grid-4-12'>
        <?php echo Form::submit('submit', 'submit', array('class' => 'btn btn-success', 'onClick' => 'validatePassword();')); ?>
    </div>
</div>

<?php echo Form::close(); ?>