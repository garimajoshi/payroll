/*<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
                <title>NeoGen Labs Payroll System</title>
                <?php echo Asset::css('reset.css'); ?>
                <?php echo Asset::css('formee-structure.css'); ?>
                <?php echo Asset::css('formee-style.css'); ?>
                <?php echo Asset::css('bootstrap.css'); ?>
		<?php echo Asset::css('template.css'); ?>
	        <?php echo Asset::js('jquery-1.6.4.min.js'); ?>
                <?php echo Asset::js('css_browser_selector.js');?>
                <?php echo Asset::js('formee.js'); ?>    
                
               <!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
        <body style="overflow: auto;">
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
            
<?php
    function createYears($start_year, $end_year, $id='year_select', $selected=null)
    {


        $selected = is_null($selected) ? date('Y') : $selected;


        $r = range($start_year, $end_year);


        $select = '<select name="'.$id.'" id="'.$id.'">';
        foreach( $r as $year )
        {
            $select .= "<option value=\"$year\"";
            $select .= ($year==$selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

    function createMonths($id='month_select', $selected=null)
    {

        $months = array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December');


        $selected = is_null($selected) ? date('m') : $selected;

        $select = '<select name="'.$id.'" id="'.$id.'">'."\n";
        foreach($months as $key=>$mon)
        {
            $select .= "<option value=\"$key\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$mon</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

    function createDays($id='day_select', $selected=null)
    {
        /*** range of days ***/
        $r = range(1, 31);

        /*** current day ***/
        $selected = is_null($selected) ? date('d') : $selected;

        $select = "<select name=\"$id\" id=\"$id\">\n";
        foreach ($r as $day)
        {
            $select .= "<option value=\"$day\"";
            $select .= ($day==$selected) ? ' selected="selected"' : '';
            $select .= ">$day</option>\n";
        }
        $select .= '</select>';
        return $select;
    }


?>
            <div id="header">
                <h1>NeoGen Labs Payroll System</h1>
                <div class="login_info pull-right">
                <?php
                if ($user = Session::get('user')) {

                    echo Html::anchor('login/logout', 'LOGOUT | ' . $user->name, array('id' => 'logout', 'class' => 'btn  btn-danger', 'style' => 'margin-top:5px'));
                    ?>
                    <?php
                } else {
                    Response::redirect('login/login');
                }
                ?> 
            </div>   
                
            </div>
                        
             <div id="left-nav" >
   		
   		
	    <ul id="nav">

			<li><a href="#">Control Panel</a>
		
				<ul>
					<li><a href="#">Admin Settings</a>
						<ul>
							<li><a href="#">Add User</a></li>
							<li><a href="#">Access Rights</a></li>
							<li><a href="#">Remove User</a></li>
							
						</ul>
					</li>
					<li><a href="#">Company Information</a></li>
					<li><a href="#">Professional Tax Settings</a></li>
					<li><a href="#">Holiday Calendar</a></li>
		
				</ul>
			</li>
		
			<li><a href="#">Employee</a>
				<ul>
					<li><a href="#">Employee Directory</a></li>
                                        <li><a href="#">Add Employee</a></li>		
					<li><a href="#">Salary Details</a></li>
					<li><a href="#">Leave</a></li>
					<li><a href="#">Archive</a></li>
		
				</ul>
			</li>
		
			<li><a href="#">Payroll</a>
				<ul>
		
					<li><a href="#">Payroll Central</a></li>
					<li><a href="#">Generate Payslip</a></li>
					<li><a href="#">Salary Structure</a></li>
					<li><a href="#">Add Bonus</a></li>
					
				</ul>
			</li>
		<li><a href="#">Reports</a>
		</ul>
	
		<!-- END Menu -->
	    
                <div id="border"></div>
                
                <div id="container">
          <?php echo $content;?>
                </div>
               
	</body>
</html>