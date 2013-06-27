<h2>Listing <span class='muted'>Users</span></h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Last login</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->password; ?></td>
			<td><?php echo $user->last_login_at; ?></td>
			<td>
				<?php echo Html::anchor('users/view/'.$user->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('users/edit/'.$user->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('users/delete/'.$user->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('users/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
