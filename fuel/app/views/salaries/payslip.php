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

<thead>
<tr>
<th>No.</th>
<th>Salary Component</th>
<th>Month</th>
<th>FYTD</th>
</tr>
</thead>

<tbody>
<tr  style="background-color: white;">
<td>1</td>
                    <td>Base Salary</td>
                    <td>'.$salary->basic.'</td>
                    <td>'.$salary->basic.'</td>


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
