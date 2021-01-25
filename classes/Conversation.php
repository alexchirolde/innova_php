<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';



class Conversation
{
    public function getConversations($limit, $offset)
    {
        $arr = array();
        $return_arr = array();
        $con = new Database();
        $participantConversations = $con->connection()->query("
            SELECT
	            conversation_id
            FROM
        	    conversation_participant
            WHERE
	            conversation_participant.participant_id = '" . TEST_PARTICIPANT . "'")->fetch_all(MYSQLI_ASSOC);
        foreach ($participantConversations as $id) {
            $arr[] = $id['conversation_id'];
        }
        $tmp = implode(',', $arr);
        $participants = $con->connection()->query("
            SELECT 
                t0.id AS id, t0.name AS name, t0.avatar AS avatar, conversation_participant.conversation_id as conversationId
            FROM 
                participant t0 
            INNER JOIN 
                conversation_participant 
            ON 
                t0.id = conversation_participant.participant_id 
            WHERE 
                conversation_participant.conversation_id
            IN 
                ($tmp)
            AND 
                t0.id <> '".TEST_PARTICIPANT."'
            
            LIMIT $limit 
            
            OFFSET $offset"
        );
        while($row = mysqli_fetch_array($participants)){

            $return_arr[] = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "avatar" => $row['avatar'],
                "conversationId" => $row['conversationId']);
        }
        return $return_arr;
    }

}
