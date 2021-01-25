<?php


class Message
{
    private $con;

    public function __construct($con){
        $this->con = $con;
    }
    public function getMessagesFromConversation($conversationId, $offset)
    {
        $return_arr = array();
        $messageInConversation = $this->con->connection()->query("
            SELECT
                pf.name AS messageFrom,
                pf.avatar AS avatar,
                pf.id AS messageFromId,
                pf.date_add AS messageFromDateAdd,
                m.message_text AS messageFromText,
                pt.name AS messageTo,
                pt.avatar AS avatar,
                pt.id AS messageToId,
                m.date_add AS messageToDateAdd
            FROM
                messages m
                LEFT JOIN participant pf ON m.message_from = pf.id
                LEFT JOIN participant pt ON m.message_to = pt.id
            WHERE
                m.conversation_id = '" . $conversationId . "'
            ORDER BY
                m.date_add ASC
            LIMIT 5 
            
            OFFSET $offset
        ");

        while ($row = mysqli_fetch_array($messageInConversation)) {

            if ($row['messageFromId'] != TEST_PARTICIPANT)
                $messageFrom = ["messageFromId" => $row['messageFromId']];
            else
                $messageFrom = ["Yo" => $row['messageFromId']];
            $return_arr[] = array(
                $messageFrom,
                'avatar' => $row['avatar'],
                "messageFrom" => $row['messageFrom'],
                "messageFromId" => $row['messageFromId'],
                "messageFromDateAdd" => $row['messageFromDateAdd'],
                "messageFromText" => $row['messageFromText'],
                "messageToId" => $row['messageToId'],
                "messageTo" => $row['messageTo'],
                "messageToDateAdd" => $row['messageToDateAdd'],
            );

        }
        $this->con->connection()->close();
        return $return_arr;
    }

    public function saveNewMessage($conversationId, $messageTo, $messageText)
    {
        $dateAdd = date('Y-m-d H:i:s');

        $this->con->connection()->query("
            INSERT INTO messages (conversation_id, message_from, message_to, message_text, date_add) 
            VALUES ('".$conversationId."', '".TEST_PARTICIPANT."','".$messageTo."','".$messageText."', '".$dateAdd."')
        ");
        $this->con->connection()->close();

        return array(
            'status' => 'Message sent!'
        );

    }

}