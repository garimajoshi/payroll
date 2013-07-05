<div class='headline'><h3>Editing <span class='muted'>User</span></h3></div>
<br>
<?php echo Form::open(array("class" => "formee well")); ?>

<div class="grid-8-12">
    <?php echo Html::anchor('users', '<< Back', array('class' => 'btn btn-large btn-danger', 'style' => 'color:#fff;')); ?>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Username <em class="formee-req">*</em>', 'username'); ?>
    </div>    
    <div class="grid-4-12">
        <span class='username'><?php echo $user->name; ?></span>
    </div>        
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Password <em class="formee-req">*</em>', 'password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::password('password', '', array('class' => 'formee-large', 'required', 'placeholder' => 'Password')); ?>
    </div>    
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Confirm Password <em class="formee-req">*</em>', 'password'); ?>
    </div>    
    <div class="grid-4-12">
        <?php echo Form::password('password', '', array('class' => 'formee-large', 'required', 'placeholder' => 'Confirm Password')); ?>
    </div>    
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Access Level <em class="formee-req">*</em>', 'access_level'); ?>
    </div>
    <div class="grid-4-12">    
        <ul class="formee-list">
            <li>
                <input name="access_level" value="user" type="radio">
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
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-large btn-success')); ?>
</div>

<?php echo Form::close(); ?>