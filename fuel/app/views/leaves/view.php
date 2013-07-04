<div class="headline"><h3>Leave <span class="muted">Details</span></h3></div>
<br />
  <?php echo Html::anchor('leaves','<< Back',array('class'=>'btn btn-large btn-success', 'style'=>'color:#fff; margin-left:40px;')); ?>
<br/><br />
<strong style="margin-left:35px; margin-top:10px;">Name:</strong> <?php echo $employee->title . '. ' . $employee->first_name . ' ' . $employee->last_name; ?>
<?php
$shl = 0;
if ($sickhalfleaves):
    foreach ($sickhalfleaves as $sickhalfleave):
        $shl++;
    endforeach;
endif;
?>
<?php
$sfl = 0;
if ($sickfullleaves):
    foreach ($sickfullleaves as $sickfullleave):
        $sfl++;
    endforeach;
endif;
?>
<?php
$vhl = 0;
if ($vacationhalfleaves):
    foreach ($vacationhalfleaves as $vacationhalfleave):
        $vhl++;
    endforeach;
endif;
?>
<?php
$vfl = 0;
if ($vacationfullleaves):
    foreach ($vacationfullleaves as $vacationfullleave):
        $vfl++;
    endforeach;
endif;

$values = [$shl, $sfl, $vhl, $vfl];

$max = (max($values));
?>
<?php if ($leaves): ?>
    <table class="table table-striped" style="margin-top: 20px;">
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
    <?php foreach ($leaves as $leave): ?>
                <tr>

                    <td><?php echo $leave->date_of_leave; ?></td>
                    <td><?php if ($leave->time == 8) echo 'Full Day';
        else echo 'Half Day'; ?></td>
                    <td><?php echo $leave->type; ?></td>
                    <td><?php echo Html::anchor('leaves/edit/' . $leave->id, '<i class=icon-pencil></i>'); ?>
                    <td><?php echo Html::anchor('leaves/delete/' . $leave->id, '<i class=icon-trash></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

                </tr>
    <?php endforeach; ?>

        </tbody>
    </table>
    <br />
    <div style="margin-left: 40px;">
        <strong>Total: </strong>
        <ol>
            <li>Sick Half day leaves : <?php echo $shl; ?></li>
            <li>Sick Full day leaves : <?php echo $sfl; ?></li>
            <li>Vacation Half day leaves : <?php echo $vhl; ?></li>
            <li>Vacation Full day leaves: <?php echo $vfl; ?></li>
        </ol>
    </div>
<?php else: ?><br /><span class="noexist"><h1> <?php echo 'No Leaves Taken'; ?></h1></span><?php endif; ?>