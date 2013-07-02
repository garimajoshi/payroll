<!doctype html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>NeoGen Labs Payroll System</title>
    
    <?php echo Asset::css('login.css'); ?>	
</head>

<body>
	<div id="top-bar">
		<div style="color: #d7d7e7;
font-family: 'Droid Sans', sans-serif;
padding-left: 50px;
font-size: 25px;
padding-bottom: 5px;
line-break: auto;
font-weight: 500;
min-width: 350px;
margin-left: 50px;
padding-top: 20px;"><h1>NeoGen Labs Payroll System</h1></div>
		<div class="page-full-width">

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
        
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl" style='margin-left:20px;'>
			
				<h1>Log in</h1>
				<h4>Enter your credentials below</h5>
			
			</div> <!-- login-intro -->
                        <!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><?php echo Asset::img('pay-logo.jpg'); ?></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	

    <div id="content">
        <div id='login-form' style='margin-top:20px;'>
            <div class="login_alert" style="margin-left: -60px">          
            <?php if (Session::get_flash('success')): ?>
                <div class="alert alert-success" >
                    <strong>Success</strong>
                    <p>
                        <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (Session::get_flash('error')): ?>
                <div class="alert alert-error">
                    <strong>Error</strong>
                    <p>
                        <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <?php echo Form::open('index.php/login/verify',array('class'=>'login-form')); ?>
<fieldset>

				<p>
					<label for="name">Username</label>
					<input type="text" name='name' id="login-username" class="round full-width-input" autofocus required />
				</p>

				<p>
					<label for="password">password</label>
					<input type="password" name='password' id="login-password" class="round full-width-input" required />
				</p>
							
			<input type='submit' value='LOG IN' class="button round blue image-right ic-right-arrow">

			</fieldset>


        <?php echo Form::close(); ?>
        </div>
    </div>

</body>

</html>