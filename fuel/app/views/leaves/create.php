<div class='headline'><h3>New <span class='muted'>Leave</span></h3></div>
<br>
<strong style="margin-left:30px;">Name: </strong><?php
    foreach ($employees as $employee): echo $employee->title . '. ' . $employee->first_name . ' ' . $employee->last_name;
    endforeach;
    ?>
<br /><br />
<?php echo render('leaves/_form'); ?>

