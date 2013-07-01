<div class="headline"><h3>Change <span class="muted">Password</span></h3></div>
<br />
<?php echo Form::open(array('class' => 'formee')); ?>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Username :', 'username'); ?>
    </div> 
    <div class="grid-4-12">
        <?php if ($user = Session::get('user')) { ?>
            <span class ="username"> <?php echo $user->name; ?></span>
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
        <?php echo Form::input('old_assword', '', array('class' => 'formee-large', 'required', 'placeholder' => 'Old Password')); ?>
    </div>        
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('New Password <em class="formee-req">*</em>', 'new_password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::input('new_Password', '', array('class' => 'formee-large', 'required', 'placeholder' => 'New Password')); ?>
    </div>        
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Retype Password <em class="formee-req">*</em>', 'check_password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::input('check_password', '', array('class' => 'formee-large', 'required', 'placeholder' => 'Retype Password')); ?>
    </div>        
</div>
<div class="grid-8-12">
    <?php echo Form::submit('submit', 'save', array('class' => 'formee-button')); ?>
</div>
<?php echo Form::close(); ?>