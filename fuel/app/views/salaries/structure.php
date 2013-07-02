
<div class="headline">
    <h3 style="z-index:0;">Edit Salary <span class='muted'>Structure</span></h3>

</div>
<br /><br />
<?php echo Form::open(array("class" => "formee well")); ?>
<div class="grid-12-12">    
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> PF Adjust:</b></label> </div>
        <div class="grid-4-12"><label>Sodexo Adjust / </label></div>
        <div class="grid-4-12"><input type="text" name="pf_adjust_value" class="span1"  value="1.048" style="height: 20px;margin-left:-10px; margin-top: 2px;"></div>
    </div>

    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Basic :</b></label> </div>

        <div class="grid-4-12"><input type="text" name="value_basic" class="span1"  value="0.400" style="height: 20px;margin-left:-10px; margin-top: 2px;"></div>
        <div class="grid-5-12"><label> of Sodexo Adjust</label></div>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> LTA :</b></label> </div>
        <div class="grid-4-12"><input type="text" name="value_lta" class="span1"  value="0.00" style="height: 20px;margin-left:-10px; margin-top: 2px;"></div>
        <div class="grid-5-12"><label> of Sodexo Adjust</label></div>

    </div>

    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Medical:</b></label> </div>
        <div class="grid-4-12"><input type="text" name="value_medical" class="span1"  value="1250.00" style="height: 20px;margin-left:-10px; margin-top: 2px;"></div>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Travel :</b></label> </div>
        <div class="grid-4-12"><input type="text" name="value_travel" class="span1"  value="800.00" style="height: 20px;margin-left:-10px; margin-top: 2px;"></div>
    </div>
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> PF Value :</b></label> </div>
        <div class="grid-4-12"><input type="text" name="value_pf" class="span1"  value="0.120" style="height: 20px;margin-left:-10px;"></div>
        <div class="grid-5-12"><label>of Sodexo Adjust</label></div>

    </div>

</div>
<?php echo Form::submit('submit', 'Save'); ?>
<?php echo Form::close(); ?>