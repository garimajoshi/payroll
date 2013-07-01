<?php echo Form::open(array("class" => "formee")); ?>
<div class=headline>	
    <div class="grid-12-12">
        <div class="grid-4-12" style="margin-top:-15px; margin-left:-35px;">
            <h3>Salary Entry for the month of</h3></div>

        <div class="grid-2-12" style="margin-top:18px;color:#f00;">
            <?php echo createMonths('month', $month); ?>
        </div>
        <div class="grid-2-12" style="margin-top:18px;">
            <?php echo createYears(2000, 2050, 'year', $year); ?>
        </div>
        <div class="grid-2-12" style="margin-top:18px;">
            <?php echo Form::submit('submit', 'view'); ?>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php
if ($salaries):

    Package::load("phpexcel");
    $excel = new PHPExcel();
    $excel->getProperties()->setCreator("NeoGen Labs")
            ->setTitle("Salary Statement");
    $excel->getActiveSheet()->setTitle('Monthly Salary Statement');
    $excel->getActiveSheet()->setShowGridlines(true);

    $excel->getActiveSheet()->getStyle('A2:U2')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFCCFFCC');
    $excel->getActiveSheet()->getStyle('V2:AC2')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFCCFFFF');
    $excel->getActiveSheet()->getStyle()->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $excel->getSecurity()->setLockWindows(true);
    $excel->getSecurity()->setLockStructure(true);
    $excel->getSecurity()->setWorkbookPassword("admin");

    $excel->getActiveSheet()->getColumnDimension()->setAutoSize(true);


    $m = array(
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

    $excel->setActiveSheetIndex(0)
            ->setCellValue('B1', $m[$month] . '-' . $year);

    $excel->setActiveSheetIndex(0)
            ->setCellValue('A2', 'No.')
            ->setCellValue('B2', 'Name')
            ->setCellValue('C2', 'Gross')
            ->setCellValue('D2', 'SDXO')
            ->setCellValue('E2', 'Adj. SDX')
            ->setCellValue('F2', 'PFV')
            ->setCellValue('G2', 'PF Adj.')
            ->setCellValue('H2', 'Basic')
            ->setCellValue('I2', 'HRA')
            ->setCellValue('J2', 'LTA')
            ->setCellValue('K2', 'Medical')
            ->setCellValue('L2', 'Travel')
            ->setCellValue('M2', 'PF')
            ->setCellValue('N2', 'Other')
            ->setCellValue('O2', "Leave")
            ->setCellValue('P2', 'Bonus1')
            ->setCellValue('Q2', 'Bonus2')
            ->setCellValue('R2', 'Allowance1')
            ->setCellValue('S2', 'Allowance2')
            ->setCellValue('T2', 'Allowance3')
            ->setCellValue('U2', 'Credit Total')
            ->setCellValue('V2', 'Prof. Tax')
            ->setCellValue('W2', 'PF')
            ->setCellValue('X2', 'Income Tax')
            ->setCellValue('Y2', 'Deduction1')
            ->setCellValue('Z2', 'Deduction2')
            ->setCellValue('AA2', 'Deduction3')
            ->setCellValue('AB2', 'Total Debit')
            ->setCellValue('AC2', 'Net');

    $excel->setActiveSheetIndex(0)
            ->setCellValue('G3', $pf_adjust->value)
            ->setCellValue('H3', $basic->value)
            ->setCellValue('I3', $hra->value)
            ->setCellValue('J3', $lta->value)
            ->setCellValue('K3', $medical->value)
            ->setCellValue('L3', $travel->value)
            ->setCellValue('M3', $pf->value);

    $rowCount = 4;
    foreach ($salaries as $salary):
        if ($salary->pf_applicable == 1):
            $pf = 1;
        else:
            $pf = 0;
        endif;

        $adj_sdxo = $salary->gross - $salary->sdxo;
        $excel->setActiveSheetIndex(0)
                ->setCellValue('A' . $rowCount, ($rowCount - 3) . ' ')
                ->setCellValue('B' . $rowCount, $salary->employee->first_name . ' ' . $salary->employee->last_name)
                ->setCellValue('C' . $rowCount, $salary->gross)
                ->setCellValue('D' . $rowCount, $salary->sdxo)
                ->setCellValue('E' . $rowCount, $adj_sdxo)
                ->setCellValue('F' . $rowCount, $pf)
                ->setCellValue('G' . $rowCount, $salary->pf_adjust)
                ->setCellValue('H' . $rowCount, $salary->basic)
                ->setCellValue('I' . $rowCount, $salary->hra)
                ->setCellValue('J' . $rowCount, $salary->lta)
                ->setCellValue('K' . $rowCount, $salary->medical)
                ->setCellValue('L' . $rowCount, $salary->travel)
                ->setCellValue('M' . $rowCount, $salary->pf_value)
                ->setCellValue('N' . $rowCount, $salary->credit_other)
                ->setCellValue('O' . $rowCount, $salary->leave)
                ->setCellValue('P' . $rowCount, $salary->bonus1)
                ->setCellValue('Q' . $rowCount, $salary->bonus2)
                ->setCellValue('R' . $rowCount, $salary->allowance1)
                ->setCellValue('S' . $rowCount, $salary->allowance2)
                ->setCellValue('T' . $rowCount, $salary->allowance3)
                ->setCellValue('U' . $rowCount, $salary->credit_total)
                ->setCellValue('V' . $rowCount, $salary->professional_tax)
                ->setCellValue('W' . $rowCount, $salary->pf_value)
                ->setCellValue('X' . $rowCount, $salary->income_tax)
                ->setCellValue('Y' . $rowCount, $salary->deduction1)
                ->setCellValue('Z' . $rowCount, $salary->deduction2)
                ->setCellValue('AA' . $rowCount, $salary->deduction3)
                ->setCellValue('AB' . $rowCount, $salary->total_debit)
                ->setCellValue('AC' . $rowCount, $salary->net);
        $rowCount++;
    endforeach;

    $file_name = $m[$month] . '-' . $year . '.xlsx';
    $objWriter = new PHPExcel_Writer_Excel2007($excel);
    $objWriter->save($file_name);

endif;
?>