<div class="headline"><h3>Listing <span class="muted">Locations</span></div>
<br />
<table class="company">
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
    <?php endforeach;
endif; ?><br />
                </div>
            </td>
        </tr></tbody>
</table>
