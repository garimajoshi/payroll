<div class='headline'><h3>Access <span class='muted'>Rights</span></h3></div>
<br />

<?php if ($accesses): ?>

    <table class='table table-striped' style='width:900px;'>
        <thead>
            <tr>
                <th>Page</th>
                <th>Moderator#1</th>
                <th>Moderator#2</th>
                <th>User</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesses as $access): ?>
                <?php echo Form::open(array('class' => 'formee')); ?>
                <tr>
                    <td><b><?php echo $access->page; ?></b></td>
                    <td><?php echo Form::checkbox('moderator1', '1', array('style' => 'margin-left:20px;')); ?>
                    <td><?php echo Form::checkbox('moderator2', '1', array('style' => 'margin-left:20px;')); ?>
                    <td><?php echo Form::checkbox('user', '1', array('style' => 'margin-left:20px;')); ?>
                    <td><?php echo Form::submit('submit', 'Change Access', array('class' => 'btn btn-info', 'style' => 'margin-left:20px;')); ?>
                </tr>
                <?php echo Form::close(); ?>
            <?php endforeach; ?>

        </tbody>
    </table>

<?php endif; ?>
