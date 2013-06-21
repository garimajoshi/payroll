
<div id="img">
<?php echo Asset::img('logo-jpg.png'); ?>
</div>

<div id="address">
    UCF Center, 84/3 Oil Mill Road (On Hennur Main Road)<br />
    Lingarajapuram, Bangalore 560084<br />
    Karnataka, India<br />
    T: +91 8025805600 &Tab;E: info@neogenlabs.com<br />
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
                    <td><?php echo $salary->basic; ?></td>
                    <td><?php echo $salary->basic; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>HRA</td>
                    <td><?php echo $salary->hra; ?></td>
                    <td><?php echo $salary->hra; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Conveyance/Transport</td>
                    <td><?php echo $salary->travel; ?></td>
                    <td><?php echo $salary->travel; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Medical</td>
                    <td><?php echo $salary->medical; ?></td>
                    <td><?php echo $salary->medical; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Special Allowance</td>
                    <td><?php echo $salary->credit_other; ?></td>
                    <td>6750.00</td>
                    <td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Bonus</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Leave Encashment</td>
                    <td><?php echo $salary->leave; ?></td>
                    <td><?php echo $salary->leave; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Other Allowance</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr style="border-bottom: 2px solid #000;">
                    <td>9</td>
                    <td>Other</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr style="font-weight:bold; padding-top: 100px;">
                    <td>10</td>
                    <td>TOTAL INCOME</td>
                    <td>20000.00</td>
                    <td>20000.00</td>
                    <td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Less:Professional Tax</td>
                    <td><?php echo $salary->professional_tax; ?></td>
                    <td><?php echo $salary->professional_tax; ?></td>
                    <td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Less:TDS Witholding</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                <tr style="border-bottom: 2px solid #000;">
                    <td>15</td>
                    <td>Other Deductions</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>
                </tr>
                    <tr style="border-bottom: 2px solid #000; font-weight: bold;">
                    <td>20</td>
                    <td>TOTAL DEDUCTIONS</td>
                    <td>20000.00</td>
                    <td>19800.00</td>
                    <td>
                </tr>
                <tr style="font-weight: bold;">
                    <td>30</td>
                    <td>NET PAYABLE</td>
                    <td><?php echo $salary->net; ?></td>
                    <td>0.00</td>
                    <td>
                </tr>
            </tbody>
        </table>
      <button class="btn btn-success" style="margin-left: 900px; margin-top: -450px">Print Payslip </button>
        