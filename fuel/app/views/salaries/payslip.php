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
$count = 1;
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

if ($company->state === "Karnataka" or $company->state === "karnataka") {
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
                <td style="width:150px; text-align:left"><b>Salary Component</b></td>
                <td style="text-align:right;"><b>' . $month[$salary->month] . ' ' . $salary->year . '</b></td>
                <td style="text-align:right;"><b>FYTD</b></td>
            </tr>
     <hr style="margin-top:-10px;"/>
        </table>';
$pdf->writeHTML($html, true, false, true, false, '');

if ($fytd['basic'] != 0) {
    $html3 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Base Salary</td>
                <td style="text-align:right">' . $salary->basic . '</td>
                <td style="text-align:right">' . number_format($fytd['basic'], 2) . '</td>
                    </tr></table>
';
    $pdf->writeHTML($html3, true, false, true, false, '');
}

if ($fytd['hra'] != 0) {
    $html3 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>HRA</td>
                <td style="text-align:right">' . $salary->hra . '</td>
                <td style="text-align:right">' . number_format($fytd['hra'], 2) . '</td>
                    </tr></table>
';
    $pdf->writeHTML($html3, true, false, true, false, '');
}

if ($fytd['lta'] != 0) {
    $html3 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>LTA</td>
                <td style="text-align:right">' . $salary->lta . '</td>
                <td style="text-align:right">' . number_format($fytd['lta'], 2) . '</td>
                    </tr></table>
';
    $pdf->writeHTML($html3, true, false, true, false, '');
}
if ($fytd['travel'] != 0) {
    $html4 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Conveyance/Transport</td>
                <td style="text-align:right">' . $salary->travel . '</td>
                <td style="text-align:right">' . number_format($fytd['travel'], 2) . '</td>
               </tr></table>
';
    $pdf->writeHTML($html4, true, false, true, false, '');
}
if ($fytd['medical'] != 0) {
    $html5 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Medical</td>
                <td style="text-align:right">' . $salary->medical . '</td>
                <td style="text-align:right">' . number_format($fytd['medical'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html5, true, false, true, false, '');
}
if ($fytd['pf_value'] != 0) {
    $html6 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Provident Fund</td>
                <td style="text-align:right">' . $salary->pf_value . '</td>
                <td style="text-align:right">' . number_format($fytd['pf_value'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html6, true, false, true, false, '');
}
if ($fytd['credit_other'] != 0) {
    $html7 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Special Allowance</td>
                <td style="text-align:right">' . $salary->credit_other . '</td>
                <td style="text-align:right">' . number_format($fytd['credit_other'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html7, true, false, true, false, '');
}
if ($fytd['bonus1'] != 0) {
    $html8 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->bonus1 . '</td>
                <td style="text-align:right">' . $salary->bonus1 . '</td>
                <td style="text-align:right">' . number_format($fytd['bonus1'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html8, true, false, true, false, '');
}
if ($fytd['bonus2'] != 0) {
    $html9 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->bonus2 . '</td>
                <td style="text-align:right">' . $salary->bonus2 . '</td>
                <td style="text-align:right">' . number_format($fytd['bonus2'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html9, true, false, true, false, '');
}
if ($fytd['allowance1'] != 0) {
    $html10 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->allowance1 . '</td>
                <td style="text-align:right">' . $salary->allowance1 . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance1'], 2) . '</td></tr></table>
';
    $pdf->writeHTML($html10, true, false, true, false, '');
}
if ($fytd['allowance2'] != 0) {
    $html11 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->allowance2 . '</td>
                <td style="text-align:right">' . $salary->allowance2 . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance2'], 2) . '</td>
               </tr></table>
';
    $pdf->writeHTML($html11, true, false, true, false, '');
}
if ($fytd['allowance3'] != 0) {
    $html12 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->allowance2 . '</td>
                <td style="text-align:right">' . $salary->allowance3 . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance3'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html12, true, false, true, false, '');
}

if ($fytd['leave'] != 0) {
    $html13 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Leave Encashment</td>
                <td style="text-align:right">' . $salary->leave . '</td>
                <td style="text-align:right">' . number_format($fytd['leave'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html13, true, false, true, false, '');
}
$html14 = '<hr /><table>
             <tr style="font-weight:bold; padding-top: 100px;">
                <td>' . $count++ . '</td>
                <td>TOTAL INCOME</td>
                <td style="text-align:right">' . $salary['credit_total'] . '</td>
                <td style="text-align:right">' . number_format($fytd['credit_total'], 2) . '</td>
            </tr>
                   
</table>';

$pdf->writeHTML($html14, true, false, true, false, '');
if ($fytd['professional_tax'] != 0) {
    $html15 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Less: Professional Tax</td>
                <td style="text-align:right">' . $salary->professional_tax . '</td>
                <td style="text-align:right">' . number_format($fytd['professional_tax'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html15, true, false, true, false, '');
}
if ($fytd['income_tax'] != 0) {
    $html16 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Less: TDS Witholding</td>
                <td style="text-align:right">' . $salary->income_tax . '</td>
                <td style="text-align:right">' . number_format($fytd['income_tax'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html16, true, false, true, false, '');
}
if ($fytd['deduction1'] != 0) {
    $html17 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->deduction1 . '</td>
                <td style="text-align:right">' . $salary->deduction1 . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction1'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html17, true, false, true, false, '');
}
if ($fytd['deduction2'] != 0) {
    $html18 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->deduction2 . '</td>
                <td style="text-align:right">' . $salary->deduction2 . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction2'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html18, true, false, true, false, '');
}
if ($fytd['deduction3'] != 0) {
    $html19 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>' . $rename->deduction3 . '</td>
                <td style="text-align:right">' . $salary->deduction3 . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction3'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html19, true, false, true, false, '');
}
if ($fytd['pf_value'] != 0) {
    $html20 = '<table>
              <tr>
                <td>' . $count++ . '</td>
                <td>Provident Fund</td>
                <td style="text-align:right">' . $salary->pf_value . '</td>
                <td style="text-align:right">' . number_format($fytd['pf_value'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html20, true, false, true, false, '');
}
$html21 = '<hr /><table>
             <tr style="font-weight:bold; padding-top: 100px;">
                <td>' . $count++ . '</td>
                <td>TOTAL DEDUCTIONS</td>
                <td style="text-align:right">' . $salary['total_debit'] . '</td>
                <td style="text-align:right">' . number_format($fytd['total_debit'], 2) . '</td>
            </tr>
            <br />
            <tr style="font-weight:bold; padding-top: 100px; border-top:1px solid #111;">
                <td>' . $count++ . '</td>
                <td>NET</td>
                <td style="text-align:right">' . $salary['net'] . '</td>
                <td style="text-align:right">' . number_format($fytd['net'], 2) . '</td>
            </tr>
                   
</table>
    <table>
        <div></div>
        Notes:
        <br/>
        <tr>
            <td style="width:40px;">1</td>
            <td style="width:220px;">Sodexo</td>
            <td style="text-align:right; width:70px;">' . number_format($salary->sdxo, 2) . '</td>
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
    </table>';
$pdf->writeHTML($html21, true, false, true, false, '');
//Close and output PDF document
$file_name = $employee->first_name . ' ' . $employee->last_name . ' ' . $month[$salary->month] . '-' . $salary->year;
$pdf->Output($file_name, 'I');
