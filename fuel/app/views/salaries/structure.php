
<div class="headline">
    <h3 style="z-index:0;">Edit Salary <span class='muted'>Structure</span></h3>

</div>
<br /><br />
<?php echo Form::open(array("class" => "formee well", 'style' => "margin-top:20px; margin-left:30px; width:1100px;")); ?>
<div class="grid-12-12" style="margin-top:2px;">    
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> PF Adjust:</b></label> </div>
        <div class="grid-5-12"><label>Sodexo Adjust / </label></div>
        <div class="grid-4-12"><?php echo Form::input('pf_adjust_value', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
    </div>

    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Basic:</b></label> </div>

        <div class="grid-4-12"><?php echo Form::input('value_basic', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
        <div class="grid-5-12"><label> of Sodexo Adjust</label></div>
    </div>
</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> HRA:</b></label> </div>
        <div class="grid-4-12"><?php echo Form::input('value_hra', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
        <div class="grid-5-12"><label> of Sodexo Adjust</label></div>

    </div>

    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> LTA:</b></label> </div>
        <div class="grid-4-12"><?php echo Form::input('value_lta', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
        <div class="grid-5-12"><label> of Sodexo Adjust</label></div>

    </div>
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> PF Value:</b></label> </div>
        <div class="grid-4-12"><?php echo Form::input('value_pf', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
        <div class="grid-5-12"><label>of Basic</label></div>

    </div>

</div>
<div class="grid-12-12">
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Medical:</b></label> </div>
        <div class="grid-4-12"><?php echo Form::input('value_medical', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
    </div>
    <div class="grid-4-12">
        <div class="grid-3-12"><label><b> Travel:</b></label> </div>
        <div class="grid-4-12"><?php echo Form::input('value_travel', '', array('class' => 'span1', 'style' => 'height:30px;')); ?></div>
    </div>


</div>
<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success','style'=>'margin-left:10px; margin-bottom:10px;')); ?>
<?php echo Form::close(); ?>