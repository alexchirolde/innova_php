<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Conversation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';


if (isset($_GET['offset'])) {
    $c = new Conversation(new Database());

    echo json_encode($c->getConversations(15, $_GET['offset']));
}