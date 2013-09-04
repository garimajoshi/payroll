<div class='headline'><h3>Access <span class='muted'>Rights</span></h3></div>
<br />

<?php if ($accesses): ?>

    <table class='table table-striped' style='width:900px;'>
        <thead>
            <tr>
                <th>Page</th>
                <th>Moderator #1</th>
                <th>Moderator #2</th>
                <th>User</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesses as $access): ?>
                <?php echo Form::open('users/accessSubmit', array('class' => 'formee')); ?>
                <tr>
                    <td><b><?php
                            if ($access->page == 'create_employee')
                                echo 'Create Employee';
							else if ($access->page == 'view_employee')
                                echo 'View Employee';	
							else if ($access->page == 'archive_employee')
                                echo 'Archive Employee';	
							else if ($access->page == 'view_leave')
                                echo 'View Leave';	
							else if ($access->page == 'add_leave')
                                echo 'Add Leave';
                            else if ($access->page == 'add_company')
                                echo 'Add Company';
                            else if ($access->page == 'add_salary')
                                echo 'Add Salary';
                            else if ($access->page == 'lock_payroll')
                                echo 'Lock Payroll';
                            else if ($access->page == 'print_salary_statement')
                                echo 'Print Salary Statement';
                            else if ($access->page == 'salary_structure')
                                echo 'Salary Structure';
                            else if ($access->page == 'add_user')
                                echo 'Add User';
                            ?></b></td>
                    <td><input type="checkbox" value="1" name="moderator1" <?php echo $access->mod1 ? 'checked' : '' ?>/></td>
                    <td><input type="checkbox" value="1" name="moderator2" <?php echo $access->mod2 ? 'checked' : '' ?>/></td>
                    <td><input type="checkbox" value="1" name="user" <?php echo $access->user ? 'checked' : '' ?>/></td>
                    <td><?php echo Form::submit('submit', 'Change Access', array('class' => 'btn btn-info', 'style' => 'margin-left:20px;')); ?>
                    <td><?php echo Form::hidden('page', $access->page); ?>
                </tr>
                <?php echo Form::close(); ?>
            <?php endforeach; ?>

        </tbody>
    </table>

<?php endif; ?>
