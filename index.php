<?php

require_once dirname(__FILE__).'/vendor/autoload.php';
require_once 'config.php';
require_once 'controllers/ConversationController.php';



$smarty->display('chat-ui.tpl');
