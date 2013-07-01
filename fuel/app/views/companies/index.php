<div class="headline"><h3>Listing <span class="muted">Locations</span></div>
<br />

<?php echo Html::anchor('companies/create', '<i class="icon-plus icon-white"></i> Add New Location', array('class' => 'btn btn-inverse', 'style' => 'color:#fff; float:right; margin-right:55px; margin-top:40px;')); ?>

<table class="company" style="margin-top:72px;">
    <thead>
        <tr>
            <th>Location</th>
            <th>Address</th>
        <tr>
    </thead>
    <tbody>
        <?php if ($companies): ?>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><b><?php echo strtoupper($company->city); ?></b> </td>
                    <td>
                        <div>
                            <h4>NeoGen Labs Pvt. Ltd.</h4>
                            <?php
                            $address = explode(',', $company->address);
                            foreach ($address as $line):
                                echo $line;
                                ?><br />
                            <?php endforeach; ?>
                            <?php echo $company->city; ?><br />
                            <?php echo $company->state . '-' . $company->pincode; ?><br />
                            <?php echo $company->country; ?><br /><br />
                            <b>Contact:</b><br />
                            T: <?php echo $company->phone; ?><br />
                            F: <?php echo $company->fax; ?><br />
                            E: <?php echo $company->email; ?><br />
                            <div style="margin-left: 300px;">
                                <?php echo Html::anchor('companies/edit/' . $company->id, 'Edit', array('class' => 'btn')); ?>
                                <?php echo Html::anchor('companies/delete/' . $company->id, 'Delete', array('class' => 'btn', 'onclick' => "return confirm('Are you sure?')")); ?>
                            </div>
                        <?php endforeach;
                    endif;
                    ?><br />
                </div>
            </td>
        </tr></tbody>
</table>
