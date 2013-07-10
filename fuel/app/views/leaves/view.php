<div class="headline"><h3>Leave <span class="muted">Details</span></h3></div>
<br />
  <?php echo Html::anchor('leaves','<< Back',array('class'=>'btn btn-success', 'style'=>'color:#fff; margin-left:40px;')); ?>
<br/><br />
<strong style="margin-left:35px; margin-top:10px;">Name:</strong> <?php echo $employee->title . '. ' . $employee->first_name . ' ' . $employee->last_name; ?>
<?php
$sl = 0;
if ($sickleaves):
    foreach ($sickleaves as $sickleave):
        $sl++;
    endforeach;
endif;
?>

<?php
$vl = 0;
if ($vacationleaves):
    foreach ($vacationleaves as $vacationleave):
        $vl++;
    endforeach;
endif;
?>

<?php if ($sickleaves): ?>
    <table class="table table-striped" style="position:fixed; margin-top: 85px; width: 450px;">
        <thead>
            <tr>
                <th>Date of Leave</th>
                <th>Half/Full</th>
                <th>Type of Leave</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($sickleaves as $sickleave): ?>
                <tr>

                    <td><?php echo $sickleave->date_of_leave; ?></td>
                    <td><?php if ($sickleave->time == 8) echo 'Full Day';
        else echo 'Half Day'; ?></td>
                    <td><?php echo $sickleave->type; ?></td>
                    <td><?php echo Html::anchor('leaves/edit/' . $sickleave->id, '<i class=icon-pencil></i>'); ?>
                    <td><?php echo Html::anchor('leaves/delete/' . $sickleave->id, '<i class=icon-trash></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

                </tr>
    <?php endforeach; ?>

        </tbody>
    </table>
<?php endif; ?>
<?php if ($vacationleaves): ?>
    <table class="table table-striped" style="position:fixed; margin-top: 85px; margin-left: 550px;width: 450px;">
        <thead>
            <tr>
                <th>Date of Leave</th>
                <th>Half/Full</th>
                <th>Type of Leave</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($vacationleaves as $vacationleave): ?>
                <tr>

                    <td><?php echo $vacationleave->date_of_leave; ?></td>
                    <td><?php if ($vacationleave->time == 8) echo 'Full Day';
        else echo 'Half Day'; ?></td>
                    <td><?php echo $vacationleave->type; ?></td>
                    <td><?php echo Html::anchor('leaves/edit/' . $vacationleave->id, '<i class=icon-pencil></i>'); ?>
                    <td><?php echo Html::anchor('leaves/delete/' . $vacationleave->id, '<i class=icon-trash></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

                </tr>
    <?php endforeach; ?>

        </tbody>
    </table>
    <br />
    <div style="position:fixed; margin-left: 40px; margin-top: 10px;">
        <strong>Total: </strong>
        <ol style="margin-top:-3px; color:#f00;">
            <li>Sick day leaves : <b><?php echo $sl; ?></b></li>
            
            <li>Vacation day leaves:<b><?php echo $vl; ?></b> </li>
        </ol>
    </div>
<?php else: ?><br /><span class="noexist"><h1> <?php echo 'No Leaves Taken'; ?></h1></span><?php endif; ?>