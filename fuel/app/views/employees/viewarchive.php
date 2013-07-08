

<div class="headline">
    <h3 style="z-index:0;">ARCHIVED <span class='muted'>EMPLOYEE</span>

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
                   
                    <td><?php echo $employee->id; ?></td>
                    <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
                    <td><?php echo $employee->phone; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo Html::anchor('employees/view/' . $employee->id, '<i class="icon-eye-open" title="View"></i>',array('id'=>'popovers','rel'=>'popover','data-content'=>'View','data-original-title'=>'View')); ?></td>
                    <td><?php echo Html::anchor('employees/restore/' . $employee->id, '<i class="icon-folder-open title="Restore"></i>',array('id'=>'popovers','rel'=>'popover','data-content'=>'Restore','data-original-title'=>'Restore')); ?></td>
                    <td><?php echo Html::anchor('employees/delete/' . $employee->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')",'id'=>'popovers','rel'=>'popover','data-content'=>'Delete','data-original-title'=>'Delete')); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
<div class='noexist'><h1>No Employees</h1></div>


<?php endif; ?>
