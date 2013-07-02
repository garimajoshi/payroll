

<div class="headline">
    <h3 style="z-index:0;">Employee <span class='muted'>Directory</span>
        <?php echo Form::open(array('action' => '/employees/search', 'method' => 'get', 'class' => 'form-search', 'style' => "float: right; margin-right: 10px;")); ?>
        <div>
            <input type="text" name="search" value="<?php echo Session::get('search'); ?>" class="search-query" />
            <button type="submit" class="btn ">
                <i class="icon-search"></i>
            </button>
        </div>
        <?php echo Form::close(); ?>
    </h3>
    <br />
</div>

<?php if ($employees): ?>

    <table class="table table-striped" style="margin-top:30px;">
        <thead>
            <tr>
                <th><input type="checkbox" value="" onclick="toggle(this);" /></th>
                <th>Employee Id</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php echo Form::open(); ?>
            <?php foreach ($employees as $employee): ?>

                <tr>
                    <td><input type="checkbox" name="check" value="<?php echo $employee->id; ?>"></td>
                    <td><?php echo $employee->id; ?></td>
                    <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
                    <td><?php echo $employee->phone; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo Html::anchor('salaries/create/' . $employee->id, '<i class="icon-plus-sign" title="Add Entry"></i>'); ?></td>
                    <td><?php echo Html::anchor('salaries/view/' . $employee->id, '<i class="icon-eye-open title="view"></i>'); ?></td>
                    <td><?php echo Html::anchor('salaries/edit/' . $employee->id . '/' . $month . '/' . $year, '<i class="icon-eye-open title="edit"></i>'); ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo Form::submit('submit', 'Generate Payslip', array('class' => 'btn btn-inverse', 'style' => 'margin-left:40px;')); ?>
    <?php echo Form::close(); ?>

<?php else: ?>
    <p>No Employees.</p>

<?php endif; ?>