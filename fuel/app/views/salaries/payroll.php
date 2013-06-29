
<div class="headline">
    <h3>Payroll <span class="muted">Central</span></h3>
</div>
<form name="payrollist" method="post">
    <div  style="margin-top:20px;">
        Payroll Year:
     <select  name="year" onchange="javascript:forpreview()" class="span2" >
     <?php $year = 2007;
            $next_year = $year + 1;
     for ($i = 1; $i <= 100; $i++) { ?>
         <option value ="<?php echo $year;?>"><?php echo $year.'-'.$next_year; $year++;$next_year++; ?></option>
     <?php } ?>
     </select>   
    </div>
    <table class="payroll-table">
        <tbody>
            <tr>
                <td style="border:1px solid #ccc; width:200px; height:100px;">April</td>
                <td style="border:1px solid #ccc;">May</td>
                <td>June</td>
            </tr>
            <tr>
                <td>July</td>
                <td>August</td>
                <td>September</td>
            </tr>
            <tr>
                <td>October</td>
                <td>November</td>
                <td>December</td>
            </tr>
            <tr>
                <td>January</td>
                <td>February</td>
                <td>March</td>
            </tr>
        </tbody>
    </table>
</form>