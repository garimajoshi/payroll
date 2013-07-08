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
        
        <td style="width:280px;font-size:10;margin-left:100px;">' . $address[0] . ' • ' . $address[1] . '<br />
            ' . $address[2] . ' • ' . $company->city . ' ' . $company->pincode . '<br />
            ' . $company->state . ' • ' . $company->country . '<br />
            T: ' . $company->phone . ' • E: ' . $company->email . '<br />

        </td>
    </tr>
</table>

<div>
    <h4 style="text-align:center;font-size:13; margin-top:-20px;"> SALARY STATEMENT</h4>
    <h4 style="text-align:center; font-weight:400;font-size:12">' . $form . '</h4>
    <p style="text-align:left;"><b>'.$employee->title .'. '. strtoupper($employee->first_name) . ' ' . strtoupper($employee->last_name) . '</b><br />
	'.$employee->address.'<br />'.$employee->city.' '.$employee->pincode.'<br />'.$employee->state.'<br />T: '.$employee->phone.'</p> 
    <br />
    
    <table style="margin-top:-10px;">
        <tbody >
            <tr>
                <td style="width:35px;"><b>No.</b></td>
                <td style="width:150px;"><b>Salary Component</b></td>
                <td style="text-align:right;"><b>' . $month[$salary->month] . ' ' . $salary->year . '</b></td>
                <td style="text-align:right;"><b>FYTD</b></td>
            </tr>
     <hr> </table>';
$pdf->writeHTML($html, true, false, true, false, '');

if ($fytd['basic'] != 0) {
    $html1 = '<table style="margin-top:-10px;"><tr>
                <td style="width:35px;"> 1</td>
                <td style="width:150px;">Base Salary</td>
                <td style="text-align:right">' . number_format($salary->basic,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['basic'], 2) . '</td>
        </tr></table>';
    $pdf->writeHTML($html1, true, false, true, false, '');
}

if ($fytd['hra'] != 0) {
    $html2 = '<table style="margin-top:-10px;">
            <tr>
                <td style="width:35px;">2</td>
                <td style="width:150px;">HRA</td>
                <td style="text-align:right">' . number_format($salary->hra,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['hra'], 2) . '</td>
            </tr>
            </table>
  ';
    $pdf->writeHTML($html2, true, false, true, false, '');
}
if ($fytd['lta'] != 0) {
    $html3 = '<table style="margin-top:-10px;">
            <tr>
                <td style="width:35px;">3</td>
                <td style="width:150px;">LTA</td>
                <td style="text-align:right">' . number_format($salary->lta,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['lta'], 2) . '</td>
            </tr>
            </table>
  ';
    $pdf->writeHTML($html3, true, false, true, false, '');
}

if ($fytd['travel'] != 0) {
    $html4 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">4</td>
                <td style="width:150px;">Conveyance/Transport</td>
                <td style="text-align:right">' . number_format($salary->travel,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['travel'], 2) . '</td>
               </tr></table>
';
    $pdf->writeHTML($html4, true, false, true, false, '');
}
if ($fytd['medical'] != 0) {
    $html5 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">5</td>
                <td style="width:150px;">Medical</td>
                <td style="text-align:right">' . number_format($salary->medical,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['medical'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html5, true, false, true, false, '');
}
if ($fytd['pf_value'] != 0) {
    $html6 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">6</td>
                <td style="width:150px;">Provident Fund</td>
                <td style="text-align:right">' . number_format($salary->pf_value,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['pf_value'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html6, true, false, true, false, '');
}
if ($fytd['credit_other'] != 0) {
    $html7 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">7</td>
                <td style="width:150px;">Special Allowance</td>
                <td style="text-align:right">' . number_format($salary->credit_other,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['credit_other'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html7, true, false, true, false, '');
}
if ($fytd['bonus1'] != 0) {
    $html8 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">8</td>
                <td style="width:150px;">' . $rename->bonus1 . '</td>
                <td style="text-align:right">' . number_format($salary->bonus1,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['bonus1'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html8, true, false, true, false, '');
}
if ($fytd['bonus2'] != 0) {
    $html9 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">9</td>
                <td style="width:150px;">' . $rename->bonus2 . '</td>
                <td style="text-align:right">' . number_format($salary->bonus2,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['bonus2'], 2) . '</td>
             </tr></table>
';
    $pdf->writeHTML($html9, true, false, true, false, '');
}
if ($fytd['allowance1'] != 0) {
    $html10 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">10</td>
                <td style="width:150px;">' . $rename->allowance1 . '</td>
                <td style="text-align:right">' . number_format($salary->allowance1,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance1'], 2) . '</td></tr></table>
';
    $pdf->writeHTML($html10, true, false, true, false, '');
}
if ($fytd['allowance2'] != 0) {
    $html11 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">11</td>
                <td style="width:150px;">' . $rename->allowance2 . '</td>
                <td style="text-align:right">' . number_format($salary->allowance2,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance2'], 2) . '</td>
               </tr></table>
';
    $pdf->writeHTML($html11, true, false, true, false, '');
}
if ($fytd['allowance3'] != 0) {
    $html12 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">12</td>
                <td style="width:150px;">' . $rename->allowance2 . '</td>
                <td style="text-align:right">' . number_format($salary->allowance3,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['allowance3'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html12, true, false, true, false, '');
}

if ($fytd['leave'] != 0) {
    $html13 = '<table style="margin-top:-10px;">
              <tr>
                <td style="width:35px;">13</td>
                <td style="width:150px;">Leave Encashment</td>
                <td style="text-align:right">' . number_format($salary->leave,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['leave'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html13, true, false, true, false, '');
}
$html14 = '<hr />
<table style="margin-top:-10px;">
             <tr style="font-weight:bold;">
                <td style="width:35px;">50</td>
                <td style="width:150px;">TOTAL INCOME</td>
                <td style="text-align:right">' . number_format($salary['credit_total'],2) . '</td>
                <td style="text-align:right">' . number_format($fytd['credit_total'], 2) . '</td>
            </tr>
                   
</table>';

$pdf->writeHTML($html14, true, false, true, false, '');
if ($fytd['professional_tax'] != 0) {
    $html15 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">51</td>
                <td style="width:150px;">Less: Professional Tax</td>
                <td style="text-align:right">' . number_format($salary->professional_tax,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['professional_tax'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html15, true, false, true, false, '');
}
if ($fytd['income_tax'] != 0) {
    $html16 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">52</td>
                <td style="width:150px;">Less: TDS Witholding</td>
                <td style="text-align:right">' . number_format($salary->income_tax,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['income_tax'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html16, true, false, true, false, '');
}
if ($fytd['deduction1'] != 0) {
    $html17 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">53</td>
                <td style="width:150px;">' . $rename->deduction1 . '</td>
                <td style="text-align:right">' . number_format($salary->deduction1,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction1'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html17, true, false, true, false, '');
}
if ($fytd['deduction2'] != 0) {
    $html18 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">54</td>
                <td style="width:150px;">' . $rename->deduction2 . '</td>
                <td style="text-align:right">' . number_format($salary->deduction2,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction2'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html18, true, false, true, false, '');
}
if ($fytd['deduction3'] != 0) {
    $html19 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">55</td>
                <td style="width:150px;">' . $rename->deduction3 . '</td>
                <td style="text-align:right">' . number_format($salary->deduction3,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['deduction3'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html19, true, false, true, false, '');
}
if ($fytd['pf_value'] != 0) {
    $html20 = '<table style="margin-left:2px;">
              <tr>
                <td style="width:35px;">56</td>
                <td style="width:150px;">Provident Fund</td>
                <td style="text-align:right">' . number_format($salary->pf_value,2) . '</td>
                <td style="text-align:right">' . number_format($fytd['pf_value'], 2) . '</td>
              </tr></table>
';
    $pdf->writeHTML($html20, true, false, true, false, '');
}
$html21 = '<hr /><table style="margin-left:2px;">
             <tr style="font-weight:bold; padding-top: 100px;">
                <td style="width:35px;">70</td>
                <td style="width:150px;">TOTAL DEDUCTIONS</td>
                <td style="text-align:right">'.number_format($salary['total_debit'],2).'</td>
                <td style="text-align:right">'.number_format($fytd['total_debit'], 2).'</td>
            </tr>
            <br />
            <tr style="font-weight:bold; padding-top: 100px; border-top:1px solid #111;">
                <td style="width:35px;">80</td>
                <td style="width:150px;">NET</td>
                <td style="text-align:right">'.number_format($salary['net'],2).'</td>
                <td style="text-align:right">'.number_format($fytd['net'], 2).'</td>
            </tr>
                   
</table>
    
        <div></div>
        Notes:
        <br/>
			<table>
        <tr>
            <td style="width:35px;">1</td>
            <td style="width:150px;">Sodexo</td>
            <td style="text-align:right;">' . number_format($salary->sdxo,2) . '</td>
			<td style="text-align:right; font-weight:bold;">'.number_format($fytd['sdxo'],2).'</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Vacation Balance (Days)</td>
            <td style="text-align:right">'.$salary->vacation_balance.'</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sick Days Balance (Days)</td>
            <td style="text-align:right">'.$salary->sick_balance.'</td>
        </tr>
    </table>';
$pdf->writeHTML($html21, true, false, true, false, '');
//Close and output PDF document
$file_name = $employee->first_name . ' ' . $employee->last_name . ' ' . $month[$salary->month] . '-' . $salary->year;
$pdf->Output($file_name, 'I');
