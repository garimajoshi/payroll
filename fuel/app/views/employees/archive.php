<div class="row">
    <h3 class="span6 pull-left">ARCHIVE</h3>
    <div class="span pull-right">
        <form class="form-search">
            <form class="form-search">
                <div class="input-append">
                    <input type="text" class="span2 search-query" name="q" value="<?php echo Session::get('query') ?>" />
                    <button type="submit" class="btn">Search</button>
                </div>

            </form>
        </form>
    </div>    
</div>
<!-- Disable the prev link if on first page -->
<div class="row span10"><span style="float: right"> <?php echo Html::anchor($prev, 'Prev') . " | " . Html::anchor($next, 'Next'); ?></span></div>
<style>
    .archive_view th{width: 150px;
                     border-bottom:1px solid black;
    }

    .archive_view td{width: 150px;
                     border-bottom:1px solid black;
    }
    .archive_view{margin-left: 15px;}
    .archive{height: 400px;overflow-y: visible}
    .archive td{text-align: center}
</style>

<div class="row archive">
    <table class="archive_view">
        <tr>
            <th width="40px">
                <?php echo "S. No." ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/id/' . $order, 'ID'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/type/' . $order, 'Type'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/first_name/' . $order, 'First Name'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/last_name/' . $order, 'Last Name'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/date/' . $order, 'Date'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/timestamp/' . $order, 'Timestamp'); ?>
            </th>
            <th>
                <?php echo Html::anchor('archive/view/amount/' . $order, 'Amount'); ?>
            </th>

        </tr>

        <?php $i = 1;
        foreach ($invoices as $invoice):
            ?>
            <tr>
                <td>
                    <?php echo $i;
                    $i++ ?>
                </td>
                <td>
                    <?php echo $invoice->id ?>
                </td>
                <td>
                    <?php echo $invoice->customer->type ?>
                </td>
                <td>
                    <?php echo $invoice->customer->first_name ?>
                </td>
                <td>
                    <?php echo $invoice->customer->last_name ?>
                </td>
                <td>
                    <?php echo $invoice->date ?>
                </td>
                <td>
                    <?php echo $invoice->timestamp ?>
                </td>
                <td>
                    <?php echo $invoice->amount ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>