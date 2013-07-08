

<div class="headline">
    <h3 style="z-index:0;">Leave <span class='muted'>Directory</span>
        <?php echo Form::open(array('action' => '/leaves/search', 'method' => 'get', 'class' => 'form-search emp-search', 'style' => "float: right; margin-right: 30px;")); ?>
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
                    <td><?php echo $employee->id; ?></td>
                    <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
                    <td><?php echo $employee->phone; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo Html::anchor('leaves/create/' . $employee->id, '<i class="icon-plus-sign" title="Add Entry"></i>',array('id'=>'popovers','rel'=>'popover','data-content'=>'Add Leave Entry','data-original-title'=>'Add')); ?></td>
                    <td><?php echo Html::anchor('leaves/view/' . $employee->id, '<i class="icon-eye-open title="view"></i>',array('id'=>'popovers','rel'=>'popover','data-content'=>'View','data-original-title'=>'View')); ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo Form::close(); ?>

<?php else: ?>
    <div class='noexist'><h1>No Employees</h1></div>

<?php endif; ?>