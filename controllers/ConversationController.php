<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Conversation.php';

if (isset($_GET['offset'])) {
    $c = new Conversation();

    echo json_encode($c->getConversations(10, $_GET['offset']));
}