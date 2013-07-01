<div class='headline'><h3>New <span class='muted'>Leave</span></h3></div>
<br>
<strong>Name:</strong><?php
    foreach ($employees as $employee): echo $employee->title . ' ' . $employee->first_name . ' ' . $employee->last_name;
    endforeach;
    ?>
<?php echo render('leaves/_form'); ?>


<p><?php echo Html::anchor('leaves', 'Back'); ?></p>
