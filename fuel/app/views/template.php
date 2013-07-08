<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>NeoGen Labs Payroll System</title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('reset.css'); ?>
        <?php echo Asset::css('formee-structure.css'); ?>
        <?php echo Asset::css('formee-style.css'); ?>

        <?php echo Asset::css('template.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::js('jquery-1.6.4.min.js'); ?>
        <?php echo Asset::js('jquery.validate.js'); ?>
        <?php echo Asset::js('bootstrap-tooltip.js'); ?>
        <?php echo Asset::js('bootstrap-popover.js'); ?>
        <?php echo Asset::js('css_browser_selector.js'); ?>
        <?php echo Asset::js('formee.js'); ?>    
        <?php echo Asset::js('countries.js'); ?>
        <!--[if IE]>
                        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->
    </head>
    <body style="overflow: auto;">
        <script>

            function validatePassword() {
                var validator = $("#loginForm").validate({
                    rules: {
                        password: "required",
                        confirmpassword: {
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password: " Enter Password",
                        confirmpassword: " <span style='color:#f00;'><em>Enter Confirm Password same as Password</em></span>"
                    }
                });

            }

        </script>

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
        function createMonths1($id = 'month_select', $selected = null) {

            $months = array(
                0 => '',
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
            <div class="page-full-width cf">

                <ul id="header-nav">
                    <li class="v-sep">
                        <?php
                        if ($user = Session::get('user')) {
                            ?><a href="#" class="round-button dark" style="color:#fff;"><i class="icon-user icon-white"></i> Logged in as <strong><?php echo $user->name; ?></strong></a>
                            <ul>
                                <li><?php echo Html::anchor('users', 'User List', array('class' => 'header-nav-child', 'style' => 'list-style-type:none;')); ?></li>
                                <li><?php echo Html::anchor('users/access', 'Access Rights', array('class' => 'header-nav-child')); ?></li>
                                <li><?php echo Html::anchor('companies', 'Company Information', array('class' => 'header-nav-child')); ?></li>
                                <li><?php echo Html::anchor('users/password', 'Change Password', array('class' => 'header-nav-child')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo Html::anchor('login/logout', '<i class="icon-off icon-white"></i>LOGOUT', array('class' => 'round-button dark', 'style' => 'color:#fff; width:80px;')); ?> </li>

                    </ul>
                    <?php
                } else {
                    Response::redirect('login/login');
                }
                ?> 


            </div>
        </div>
        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success" style="z-index:500; margin-left: 500px;">
                <strong>Success</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-error" style="z-index:500; margin-left: 500px;">
                <strong>Error</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                </p>
            </div>
        <?php endif; ?>

        <div style="position:fixed; z-index: 20; background-color: #fff;">
            <div class="left-sidebar">
                <div style="margin-top:100px;">
                    <ul class="menu">
                        <li class="item1"><a href="#">Employee</a>
                            <ul>
                                <li class ="subitem1"><?php echo Html::anchor('employees', 'Employee Directory', array('class' => 'subitem1')); ?></li>
                                <li class ="subitem2"><?php echo Html::anchor('employees/create', 'Add Employee'); ?></li>
                                <li class="subitem2"><?php echo Html::anchor('leaves', 'Leave'); ?></li>
                                <li class="subitem2"><?php echo Html::anchor('employees/viewarchive', 'Archive'); ?></li>
                                <li class="subitem2"><?php echo Html::anchor('employees/viewDelete','Deleted Employees'); ?></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Payroll</a>
                            <ul>
                                <li class ="subitem1"><?php echo Html::anchor('salaries/', 'Payroll Central'); ?></li>
                                <li class="subitem2"><?php echo Html::anchor('salaries/structure', 'Salary Structure'); ?></li>
                                <li class="subitem2"><?php echo Html::anchor('salaries/statement', 'Salary Statement'); ?></li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="border"></div></div>
        <div id="container">
            <?php echo $content; ?>
        </div>
        <script type="text/javascript">
            $(function() {
                var menu_ul = $('.menu > li > ul'),
                        menu_a = $('.menu > li > a');
                menu_ul.hide();
                menu_a.click(function(e) {
                    e.preventDefault();
                    if (!$(this).hasClass('active')) {
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true, true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true, true).slideUp('normal');
                    }
                });
            });
        </script>
        <script>
        $(function(){
            $('#popovers').popover();
        });
        </script>
    </body>
</html>