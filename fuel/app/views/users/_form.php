<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>

<div class="grid-8-12">
    <?php echo Html::anchor('users', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Username <em class="formee-req">*</em>', 'username'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Username')); ?>
    </div>        
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Password <em class="formee-req">*</em>', 'password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::password('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'formee-large', 'required', 'placeholder' => 'Password')); ?>
    </div>    
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Access Level  <em class="formee-req">*</em>', 'access_level'); ?>
    </div>
    <div class="grid-4-12">    
        <ul class="formee-list">
            <li>
                <input name="access_level" value="user" type="radio" checked>
                <label>User</label>
            </li>
            <li>
                <input name="access_level" value="mod1" type="radio">
                <label>Moderator1</label>
            </li>
            <li>
                <input name="access_level" value="mod2" type="radio">
                <label>Moderator2</label>
            </li>
            <li>
                <input name="access_level" value="admin" type="radio">
                <label>Admin</label>
            </li>
        </ul>
    </div>  
</div>

<div class="grid-8-12">
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
</div>

<?php echo Form::close(); ?>