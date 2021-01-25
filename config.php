<?php
require_once dirname(__FILE__).'/vendor/autoload.php';

define('ROOT_DIR', dirname(__FILE__));

class Database
{

    function connection()
    {
        return mysqli_connect('localhost',
            'root',
            'Al3j4ndr0',
            'chat_test',
            3306,
        );
    }
}

const TEST_PARTICIPANT = 1;
//
$smarty = new Smarty();
$smarty->setTemplateDir(ROOT_DIR.'/views/templates/');
$smarty->setCompileDir(ROOT_DIR.'/views/templates/compiles/');
