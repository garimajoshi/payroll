<?php

$pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NeoGen Labs Pvt. Ltd.');
$pdf->SetTitle('Salary Statement');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$html = '
    
<div id="img">
<img src="assets/img/pay-logo.jpg"height="80" width="140" />
</div>

<div id="address">
' . $company->address . '<br />
    ' . $company->city . ' ' . $company->pincode . '<br />
    ' . $company->state . ' ' . $company->country . '<br />
    T: ' . $company->phone . ' E: ' . $company->email . '<br />
    
</div>

<h2 style="text-align:center; margin-top: 100px; margin-left: -100px">SALARY STATEMENT </h2>
        <span style="margin-left:400px; font-size: 14px;">FORM VI, RULE 29 (2)</span><br />
      <br />  <strong>Name:</strong>

<table class="salary">

<thead>
<tr style="border-bottom: 2px solid #000; text-align: left;">
                    <th>No.</th>
                    <th>Salary Component</th>
                    <th>Apr-12</th>
                    <th>FYTD</th>
                </tr>
</thead>

<tbody>
<tr style="padding-left: 20px;">
<td>1</td>
                    <td>Base Salary</td>
                    <td>' . $salary->basic . '</td>
                        <td>' . $salary->basic . '</td>
<style >

 .address{}
 .header{ border-bottom:4px solid black;}
</style>

<table>
<tr>
<td style="width:220px">
<img src="assets/img/pay-logo.jpg"height="80" width="140" />
</td>
<td style="text-align: right;width:320px">
		
<p>
    ' . $company->address . '<br />
    ' . $company->city . ' ' . $company->pincode . '<br />
    ' . $company->state . ' ' . $company->country . '<br />
    T: ' . $company->phone . ' E: ' . $company->email . '<br />
</p>

</td>
</tr>
</table>

<div class= "main" style="position:fixed;top:0px;width:100%;min-height:400px">
<h4 style="text-align:center"> SALARY STATEMENT</h4>
<h5 style="text-align:left"> Name:</h5>

<br />
<table border="1" style="text-align:left;">

<tbody>

<tr>
<td>1</td>
                    <td>HRA</td>
                    <td>' . $salary->hra . '</td>
                        <td>' . $salary->hra . '</td>


</tr>

<tr>
<td>3</td>
                    <td>Conveyance/Transport</td>
                    <td>' . $salary->travel . '</td>
                    <td>' . $salary->travel . '</td>


</tr>
<tr>
<td>4</td>
                    <td>Medical</td>
                    <td>' . $salary->medical . '</td>
                    <td>' . $salary->medical . '</td>


</tr>
<tr>
<td>5</td>
                    <td>Special Allowance</td>
                    <td>' . $salary->credit_other . '</td>
                    <td>' . $salary->credit_other . '</td>


</tr>
<tr>
<td>6</td>
                    <td>Bonus</td>
                    <td>' . $salary->bonus1 . '</td>
                    <td>' . $salary->bonus1 . '</td>


</tr>
<tr>
<td>7</td>
                    <td>Leave Encashment</td>
                    <td>' . $salary->leave . '</td>
                    <td>' . $salary->leave . '</td>


</tr>
<tr>
                    <td>8</td>
                    <td>Other Allowance</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
<tr style="border-bottom: 2px solid #000;">
                    <td>9</td>
                    <td>Other</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                
<tr style="font-weight:bold; padding-top: 100px;">
                    <td>10</td>
                    <td>TOTAL INCOME</td>
                    <td>20000.00</td>
                    <td>20000.00</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Less:Professional Tax</td>
                    <td><?php echo $salary->professional_tax; ?></td>
                    <td><?php echo $salary->professional_tax; ?></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Less:TDS Witholding</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                <tr style="border-bottom: 2px solid #000;">
                    <td>15</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                </tr>
                    <tr style="border-bottom: 2px solid #000; font-weight: bold;">
                    <td>20</td>
                    <td>TOTAL DEDUCTIONS</td>
                    <td>' . $salary->total_debit . '</td>
                    <td>' . $salary->total_debit . '</td>
                </tr>
                <tr style="font-weight: bold;">
                    <td>30</td>
                    <td>NET PAYABLE</td>
                    <td>' . $salary->net . '</td>
                    <td>' . $salary->net . '</td>
                </tr>
<tr  style="background-color: white;">
<td>2</td>
                    <td>HRA</td>
                    <td>'.$salary->hra.'</td>
                    <td>'.$salary->hra.'</td>


</tr>
<tr  style="background-color: white;">
<td>3</td>
                    <td>Conveyance/Transport</td>
                    <td>'.$salary->travel.'</td>
                    <td>'.$salary->travel.'</td>


</tr>
<tr  style="background-color: white;">
<td>4</td>
                    <td>Medical</td>
                    <td>'.$salary->medical.'</td>
                    <td>'.$salary->medical.'</td>


</tr>
<tr  style="background-color: white;">
<td>5</td>
                    <td>Special Allowance</td>
                    <td>'.$salary->credit_other.'</td>
                    <td>'.$salary->credit_other.'</td>


</tr>
</tbody>
</table>


</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('salary.pdf', 'I');
