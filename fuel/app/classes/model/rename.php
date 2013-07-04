<?php

use Orm\Model;

class Model_Rename extends Model {

    protected static $_properties = array(
        'id',
        'bonus1',
        'bonus2',
        'allowance1',
        'allowance2',
        'allowance3',
        'deduction1',
        'deduction2',
        'deduction3',
    );
    protected static $_table_name = 'rename';

}