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
        <?php echo Asset::js('css_browser_selector.js'); ?>
        <?php echo Asset::js('formee.js'); ?>    
        <?php echo Asset::js('countries.js'); ?>
        <script type= "text/javascript" src = "countries.js"></script>
        <!--[if IE]>
                 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
         <![endif]-->
    </head>
    <body style="overflow: auto;">

        <?php

        function createYears($start_year, $end_year, $id = 'year_select', $selected = null) {


            $selected = is_null($selected) ? date('Y') : $selected;


            $r = range($start_year, $end_year);


            $select = '<select name="' . $id . '" id="' . $id . '">';
            foreach ($r as $year) {
                $select .= "<option value=\"$year\"";
                $select .= ($year == $selected) ? ' selected="selected"' : '';
                $select .= ">$year</option>\n";
            }
            $select .= '</select>';
            return $select;
        }

        function createMonths($id = 'month_select', $selected = null) {

            $months = array(
                0=>'',
                1 => 'January',
                2 => 'February',
                3 => 'March',
                4 => 'April',
                5 => 'May',
                6 => 'June',
                7 => 'July',
                8 => 'August',
                9 => 'September',
                10 => 'October',
                11 => 'November',
                12 => 'December');


            $selected = is_null($selected) ? date('m') : $selected;

            $select = '<select name="' . $id . '" id="' . $id . '">' . "\n";
            foreach ($months as $key => $mon) {
                $select .= "<option value=\"$key\"";
                $select .= ($key == $selected) ? ' selected="selected"' : '';
                $select .= ">$mon</option>\n";
            }
            $select .= '</select>';
            return $select;
        }

        function createDays($id = 'day_select', $selected = null) {
            /*             * * range of days ** */
            $r = range(0, 31);

            /*             * * current day ** */
            $selected = is_null($selected) ? date('d') : $selected;

            $select = "<select name=\"$id\" id=\"$id\">\n";
            foreach ($r as $day) {
                $select .= "<option value=\"$day\"";
                $select .= ($day == $selected) ? ' selected="selected"' : '';
                $select .= ">$day</option>\n";
            }
            $select .= '</select>';
            return $select;
        }
        ?>
        <div id="header">
            <h1>NeoGen Labs Payroll System</h1>
            
        <?php
        if ($user = Session::get('user')) {

            echo Html::anchor('login/logout', '<i class="icon-off icon-white"></i>LOGOUT |<i class="icon-user icon-white"></i> ' . $user->name, array('id' => 'logout', 'class' => 'btn btn-inverse', 'style' => 'color:#fff;margin-top:-28px; margin-left:1220px;' ));
            ?>
    <?php
} else {
    Response::redirect('login/login');
}
?> 
               

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
                        <li><a href="http://localhost/payroll/public/employees/">Employee Directory</a></li>
                        <li><a href="http://localhost/payroll/public/employees/create">Add Employee</a></li>		
                        <li><a href="http://localhost/payroll/public/salaries/">Salary Details</a></li>
                        <li><a href="#">Leave</a></li>
                        <li><a href="http://localhost/payroll/public/employees/viewarchive">Archive</a></li>

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
<?php echo $content; ?>
            </div>

    </body>
</html>