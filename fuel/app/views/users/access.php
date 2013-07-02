<div class='headline'><h3>Access <span class='muted'>Rights</span></h3></div>
<br />

<?php if ($accesses): ?>
<?php echo Form::open(array('class'=>'formee'));?>
<table class=' table table-striped'>
    <thead>
        <tr>
            <th>Page</th>
            <th>Moderator1</th>
            <th>Moderator2</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($accesses as $access):?>
        <tr>
        <td><b><?php echo $access->page;?></b></td>
        <td><?php echo Form::checkbox('moderator1','1',array('style'=>'margin-left:20px;'));?>
        <td><?php echo Form::checkbox('moderator2','1',array('style'=>'margin-left:20px;'));?>
        <td><?php echo Form::checkbox('user','1',array('style'=>'margin-left:20px;'));?>
        
        </tr>
<?php endforeach; ?>

    </tbody>
</table>
<?php echo Form::submit('submit','Save',array('style'=>'margin-left:36px;')); ?>
<?php echo Form::close(); ?>
<?php endif; ?>
