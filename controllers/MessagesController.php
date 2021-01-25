<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Message.php';

$m = new Message(new Database());
if (isset($_GET['conversationId']) && isset($_GET['offset'])) {
    echo json_encode($m->getMessagesFromConversation($_GET['conversationId'], $_GET['offset']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $m->saveNewMessage($_POST['conversationId'], $_POST['messageTo'], $_POST['messageText'] );
}