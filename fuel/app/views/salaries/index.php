

<div class="headline">
    <h3 style="z-index:0;">Employee <span class='muted'>Directory</span>
        <form class="form-search" method="get" action="/payroll/public/employees/search" style="float: right; margin-right: 10px;">
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

<?php echo Form::open(array("class" => "formee", "method" => "get")); ?>
             <div class="grid-3-12">
                        <?php echo createYears(1920, 2500, 'year', date('Y')); ?>
                    </div>
                    <div class="grid-3-12">
                        <?php echo createMonths('month', date('M')); ?>
                    </div>
<?php echo Form::close(); ?>
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
                <th></th>
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
                    <td><?php echo Html::anchor('salaries/create/' . $employee->id.'?month='.
                            Input::get('month'), '<i class="icon-plus-sign" title="Add Entry"></i>'); ?></td>
                    <td><?php echo Html::anchor('salaries/view/' . $employee->id, '<i class="icon-pencil title="Edit"></i>'); ?></td>
                    <td><?php echo Html::anchor('salaries/archive/' . $employee->id, '<i class="icon-folder-close" title="Archive"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No Employees.</p>

<?php endif; ?>
