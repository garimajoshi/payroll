<!doctype html>

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>NeoGen Labs Payroll System</title>

	<?php echo Asset::css('login.css'); ?>	
</head>

<body>
	
	<div id="container">
            <div id="header"><h1><span class="neogen">NeoGen Labs Payroll System</span></h1></div>
		<?php echo Form::open('index.php/login/verify'); ?>
		
		<label for="name">Username:</label>
		
		<input name="name" type="name" placeholder="Username" autofocus required>
		
		<label for="password">Password:</label>
		
		<input type="password" name="password" placeholder="Password" required>
		
		<div id="lower">
		<p><a href="#">Forgot your password?</a>
		<input type="submit" value="Login">
		
		</div>
		
		<?php echo Form::close(); ?>
		
        </div>
	
</body>

</html>