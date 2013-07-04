

<div class="headline">
    <h3 style="z-index:0;">DELETED <span class='muted'>EMPLOYEE</span>

        <form class="form-search" method="get" style="float: right; margin-right: 10px;">
            <div>
                <input type="text" name="search" value="<?php echo Session::get('search'); ?>" class="search-query" />
                <button type="submit" class="btn ">
                    <i class="icon-search"></i>
                </button>
            </div>
        </form>
    </h3>
    <br />
</div>

<?php if ($employees): ?>
    <table class="table table-striped" style="margin-top:30px;">
        <thead>
            <tr>
                <th><?php echo Form::checkbox('all'); ?></th>
                <th>Employee Id</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo Form::checkbox('$employee->id'); ?></td>
                    <td><?php echo $employee->id; ?></td>
                    <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
                    <td><?php echo $employee->phone; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo Html::anchor('employees/view/' . $employee->id, '<i class="icon-eye-open" title="View"></i>'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
<div class='noexist'><h1>No Employees</h1></div>


<?php endif; ?>
