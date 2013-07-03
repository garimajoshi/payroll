<div class="headline"><h3>Leave <span class="muted">Details</span></h3></div>
<br />
<strong>Name:</strong> <?php echo $employee->title. ' ' .$employee->first_name. ' ' .$employee->last_name; ?>
<?php $shl=0; 
if ($sickhalfleaves): 
    foreach($sickhalfleaves as $sickhalfleave):
    $shl ++;
    endforeach;
    endif; ?>
<?php $sfl=0; 
if ($sickfullleaves): 
    foreach($sickfullleaves as $sickfullleave):
    $sfl ++;
    endforeach;
    endif; ?>
<?php $vhl=0; 
if ($vacationhalfleaves): 
    foreach($vacationhalfleaves as $vacationhalfleave):
    $vhl ++;
    endforeach;
    endif; ?>
<?php $vfl=0; 
if ($vacationfullleaves): 
    foreach($vacationfullleaves as $vacationfullleave):
    $vfl ++;
    endforeach;
    endif; 

 $values = [$shl, $sfl, $vhl, $vfl]; 

 $max = (max($values));

?>

<table>
    <thead>
        <tr>
            <th colspan='2' style='text-align:center;'>Sick Leaves</th>
            <th colspan='2' style='text-align:center;'>Vacation Leaves</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style='text-align:center;'>Half day</td>
            <td style='text-align:center;'>Full day</td>
            <td style='text-align:center;'>Half day</td>
            <td style='text-align:center;'>Full day</td>
        </tr>
        <?php for($i=0;$i<$max;$i++){?>
        
        <tr>
        <td style='text-align:center;'><?php if($sickhalfleaves): echo $sickhalfleave->date_of_leave; endif;?></td>
        <td style='text-align:center;'><?php if($sickfullleaves):echo $sickfullleave->date_of_leave; endif;?></td>
        <td style='text-align:center;'><?php if($vacationhalfleaves):echo $vacationhalfleave->date_of_leave; endif;?></td>
        <td style='text-align:center;'><?php if($sickhalfleaves): echo $vacationfullleave->date_of_leave; endif;?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>