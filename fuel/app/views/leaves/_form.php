<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Html::anchor('leaves', '<< Back', array('class' => 'btn btn-danger', 'style' => 'color:#fff;')); ?>
    </div>
</div>
<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Type <em class="formee-req">*</em>', 'type', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-4-12">
        <?php echo Form::select('type', Input::post('type', isset($leave) ? $leave->type : ''), array('sick' => 'Sick', 'vacation' => 'Vacation')); ?>

    </div>
</div>

<div class="grid-8-12">
    <div class="grid-4-12">
        <?php echo Form::label('Time Off <em class="formee-req">*</em>', 'date_of_leave', array('style' => 'font-weight:700;')); ?>
    </div>

    <div class="grid-2-12">
        <?php echo createYears(1920, 2500, 'dol_year', date('Y')); ?>
    </div>
    <div class="grid-2-12">
        <?php echo createMonths('dol_month', date('m')); ?>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <?php echo Form::label('Select Dates <em class="formee-req">*</em>', 'dol_date', array('style' => 'font-weight:700;')); ?>
    </div>
    <div class="grid-9-12" style="font-size: 18px">
        <table style="margin-left: -5px;">
            <tbody>
                <tr>
                    <td><input type="checkbox" name="dol_date[]" value="1" /> 01</td>
                    <td><input type="checkbox" name="dol_date[]" value="2" /> 02</td>
                    <td><input type="checkbox" name="dol_date[]" value="3" /> 03</td>
                    <td><input type="checkbox" name="dol_date[]" value="4" /> 04</td>
                    <td><input type="checkbox" name="dol_date[]" value="5" /> 05</td>
                    <td><input type="checkbox" name="dol_date[]" value="6" /> 06</td>
                    <td><input type="checkbox" name="dol_date[]" value="7" /> 07</td>
                    <td><input type="checkbox" name="dol_date[]" value="8" /> 08</td>
                    <td><input type="checkbox" name="dol_date[]" value="9" /> 09</td>
                    <td><input type="checkbox" name="dol_date[]" value="10" /> 10</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="dol_date[]" value="11" /> 11</td>
                    <td><input type="checkbox" name="dol_date[]" value="12" /> 12</td>
                    <td><input type="checkbox" name="dol_date[]" value="13" /> 13</td>
                    <td><input type="checkbox" name="dol_date[]" value="14" /> 14</td>
                    <td><input type="checkbox" name="dol_date[]" value="15" /> 15</td>
                    <td><input type="checkbox" name="dol_date[]" value="16" /> 16</td>
                    <td><input type="checkbox" name="dol_date[]" value="17" /> 17</td>
                    <td><input type="checkbox" name="dol_date[]" value="18" /> 18</td>
                    <td><input type="checkbox" name="dol_date[]" value="19" /> 19</td>
                    <td><input type="checkbox" name="dol_date[]" value="20" /> 20</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="dol_date[]" value="21" /> 21</td>
                    <td><input type="checkbox" name="dol_date[]" value="22" /> 22</td>
                    <td><input type="checkbox" name="dol_date[]" value="23" /> 23</td>
                    <td><input type="checkbox" name="dol_date[]" value="24" /> 24</td>
                    <td><input type="checkbox" name="dol_date[]" value="25" /> 25</td>
                    <td><input type="checkbox" name="dol_date[]" value="26" /> 26</td>
                    <td><input type="checkbox" name="dol_date[]" value="27" /> 27</td>
                    <td><input type="checkbox" name="dol_date[]" value="28" /> 28</td>
                    <td><input type="checkbox" name="dol_date[]" value="29" /> 29</td>
                    <td><input type="checkbox" name="dol_date[]" value="30" /> 30</td>
                </tr>    
                <tr>
                     <td><input type="checkbox" name="dol_date[]" value="31" /> 31</td>
                </tr>
                
            </tbody>
        </table>
         
    </div>
<div class="grid-2-12 ">
        <?php echo Form::submit('submit', 'Save', array('style'=>'margin-top:30px',"class" => "btn btn-success")); ?>
    </div>
</div>
<?php echo Form::close(); ?>