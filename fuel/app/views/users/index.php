<div class="headline"><h3>Listing <span class='muted'>Users</span></h3></div>
<br>
<?php echo Html::anchor('users/create', '<i class="icon-plus icon-white"></i> Add New User', array('class' => 'btn btn-inverse', 'style' => "color:#fff; float:right; margin-top:40px; margin-right:40px;")); ?>

<?php if ($users): ?>
    <table class="table table-striped" style="margin-top:72px;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Last Login</th>
                <th>Access Level</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>		
                <tr>

                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->last_login_at; ?></td>
                    <td><?php
                        if ($user->access_level == "user"):
                            echo 'User';
                        elseif ($user->access_level == "mod1"):
                            echo 'Moderator1';
                        elseif ($user->access_level == "mod2"):
                            echo 'Moderator2';
                        else:
                            echo 'Administrator';
                        endif;
                        ?>
                    </td>

                    <td><?php echo Html::anchor('users/edit/' . $user->id, '<i class="icon-wrench" title="Edit"></i>'); ?></td>
                    <td><?php echo Html::anchor('users/delete/' . $user->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?></td>
                </tr>
            <?php endforeach; ?>	
        </tbody>
    </table>

<?php else: ?>
    <p>No Users.</p>

<?php endif; ?><p>

</p>
