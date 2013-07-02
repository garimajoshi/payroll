<div class="headline"><h3>Leave <span class="muted">Details</span></h3></div>
<br />
<strong>Name:</strong> <?php echo $employee->title. ' ' .$employee->first_name. ' ' .$employee->last_name; ?>
<table>
    <thead>
        <th colspan="8" style="text-align:center">Sick Leaves</th>
        <th colspan="8" style="text-align:center">Vacation Leaves</th>
    </thead>
    <tbody>
        <tr>
    <td colspan="4" style="text-align:center">Half day</td>
    <td colspan="4" style="text-align:center">Full day</td>
    <td colspan="4" style="text-align:center">Half day</td>
    <td colspan="4" style="text-align:center">Full day</td>
        </tr>
            <?php if ($sickhalfleaves or $sickfullleaves): foreach($sickhalfleaves as $sickhalfleave): ?>
            <?php  ?>

        <tr>
            <td> <?php echo $sickhalfleave->date_of_leave;?></td>
            <td> <?php echo $sickfullleave->date_of_leave;?></td>
            <td> <?php echo $vacationhalfleave->date_of_leave;?></td>
            <td> <?php echo $vacationfullleave->date_of_leave;?></td>
</tr>        

    <?php endforeach; endif;?>
  endif;
        
    </tbody>
</table>