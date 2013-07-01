
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

<?php echo Html::anchor('employees/create', '<i class="icon-plus icon-white"></i> Add New Employee', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:60px;margin-right:-195px; margin-bottom:5px;")); ?>


<?php if ($employees): ?>

    <table class="table table-striped" style="margin-top:90px;">
        <thead>
            <tr>
                <th><input type="checkbox" value="" onclick="toggle(this);" /></th>
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
                    <td><input type="checkbox" name="check" value="<?php echo $employee->id; ?>"></td>
                    <td><?php echo $employee->id; ?></td>
                    <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
                    <td><?php echo $employee->phone; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo Html::anchor('employees/view/' . $employee->id, '<i class="icon-eye-open" title="View"></i>'); ?></td>
                    <td><?php echo Html::anchor('employees/edit/' . $employee->id, '<i class="icon-pencil title="Edit"></i>'); ?></td>
                    <td><?php echo Html::anchor('employees/archive/' . $employee->id, '<i class="icon-folder-close" title="Archive"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Employees.</p>

<?php endif; ?>
