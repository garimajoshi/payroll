<?php

$pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NeoGen Labs Pvt. Ltd.');
$pdf->SetTitle('Salary Statement');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$month = array(
    '1' => 'Jan',
    '2' => 'Feb',
    '3' => 'Mar',
    '4' => 'Apr',
    '5' => 'May',
    '6' => 'Jun',
    '7' => 'Jul',
    '8' => 'Aug',
    '9' => 'Sep',
    '10' => 'Oct',
    '11' => 'Nov',
    '12' => 'Dec',
);

if ($company->state === "Karnataka") {
    $form = 'Form VI, Rule 29 (2)';
} else {
    $form = '';
}

$address = explode(',', $company->address);

$html = '
<table>
    <tr>

        <td style="width:280px">
            <img src="assets/img/pay-logo.jpg" height="60"/>
        </td>
        
        <td style="width:320px;font-size:9">' . $address[0] . ' • ' . $address[1] . '<br />
            ' . $address[2] . ' • ' . $company->city . ' ' . $company->pincode . '<br />
            ' . $company->state . ' • ' . $company->country . '<br />
            T: ' . $company->phone . ' • E: ' . $company->email . '<br />

        </td>
    </tr>
</table>

<div>
    <h4 style="text-align:center;font-size:13"> SALARY STATEMENT</h4>
    <h4 style="text-align:center; font-weight:400;font-size:12">' . $form . '</h4>
    <p style="text-align:left">Name: ' . $employee->first_name . ' ' . $employee->last_name . '</p>
    <br />
    <br />
    <table>
        <tbody >
            <tr>
                <td style="width:35px;"><b>No.</b></td>
                <td style="width:220px;"><b>Salary Component</b></td>
                <td style="text-align:right; width:80px;"><b>' . $month[$salary->month] . ' - ' . $salary->year . '</b></td>
                <td style="text-align:right;  width:100px;"><b>FYTD</b></td>
            </tr>
     <hr style="margin-top:-10px;"/>   
         
            <tr>
                <td>1</td>
                <td>Base Salary</td>
                <td style="text-align:right">' . $salary->basic . '</td>
                <td style="text-align:right">' . $salary->basic . '</td>
            </tr>

            <tr>
                <td>2</td>
                <td>HRA</td>
                <td style="text-align:right">' . $salary->hra . '</td>
                <td style="text-align:right">' . $salary->hra . '</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Conveyance/Transport</td>
                <td style="text-align:right">' . $salary->travel . '</td>
                <td style="text-align:right">' . $salary->travel . '</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Medical</td>
                <td style="text-align:right">' . $salary->medical . '</td>
                <td style="text-align:right">' . $salary->medical . '</td>


            </tr>
            <tr>
                <td>5</td>
                <td>Special Allowance</td>
                <td style="text-align:right">' . $salary->credit_other . '</td>
                <td style="text-align:right">' . $salary->credit_other . '</td>


            </tr>
            <tr>
                <td>6</td>
                <td>Bonus</td>
                <td style="text-align:right">' . $salary->bonus1 . '</td>
                <td style="text-align:right">' . $salary->bonus1 . '</td>


            </tr>
            <tr>
                <td>7</td>
                <td>Leave Encashment</td>
                <td style="text-align:right">' . $salary->leave . '</td>
                <td style="text-align:right">' . $salary->leave . '</td>


            </tr>
            <tr>
                <td>8</td>
                <td>Other Allowance</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <tr style="border-bottom: 2px solid #000;">
                <td>9</td>
                <td>Other</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <hr />
            <br />
            
            <tr style="font-weight:bold; padding-top: 100px;">
                <td>10</td>
                <td>TOTAL INCOME</td>
                <td style="text-align:right">20000.00</td>
                <td style="text-align:right">20000.00</td>
            </tr>
            <div></div>
             <tr>
                <td>11</td>
                <td>Less:Professional Tax</td>
                <td style="text-align:right"><?php echo $salary->professional_tax; ?></td>
                <td style="text-align:right"><?php echo $salary->professional_tax; ?></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Less:TDS Witholding</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <tr>
                <td>13</td>
                <td>Other Deductions</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Other Deductions</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <tr style="border-bottom: 2px solid #000;">
                <td>15</td>
                <td>Other Deductions</td>
                <td style="text-align:right">0.00</td>
                <td style="text-align:right">0.00</td>
            </tr>
            <hr />
            <tr style="border-bottom: 2px solid #000; font-weight: bold;">
                <td>20</td>
                <td>TOTAL DEDUCTIONS</td>
                <td style="text-align:right">' . $salary->total_debit . '</td>
                <td style="text-align:right">' . $salary->total_debit . '</td>
            </tr>
<div></div>            
<hr />
            <tr style="font-weight: bold;">
                <td>30</td>
                <td>NET PAYABLE</td>
                <td style="text-align:right">' . $salary->net . '</td>
                <td style="text-align:right">' . $salary->net . '</td>
            </tr>
        </tbody>
    </table>
    <table>
        <div></div>
        Notes:
        <br/>
        <tr>
            <td style="width:40px;">1</td>
            <td style="width:220px;">Sodexo</td>
            <td style="text-align:right; width:70px;">' . $salary->sdxo . '</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Vacation Balance (Days)</td>
            <td style="text-align:right">0.00</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sick Days Balance (Days)</td>
            <td style="text-align:right">0.00</td>
        </tr>
    </table>

</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('salary.pdf', 'I');
