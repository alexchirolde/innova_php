<?php

require_once 'config.php';

class DataBaseGenerator
{
    public $connection;
    public $dateAdd;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->dateAdd = date('Y-m-d H:i:s');

    }

    public function generateMessages()
    {
        $messageText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac arcu egestas nisl 
        euismod efficitur. Donec mattis consectetur massa, et varius erat. Praesent gravida malesuada faucibus. 
        Duis dolor arcu, dapibus id mollis eget, condimentum sit amet nunc. ";
        $reply = "Class aptent taciti sociosqu ad litora 
        torquent per conubia nostra, per inceptos himenaeos. Nunc imperdiet nulla nec tortor convallis, nec lobortis 
        eros suscipit. Mauris dolor sapien, consectetur in tortor eu, pulvinar venenatis augue. Sed augue libero, 
        auctor et nibh nec, aliquet suscipit mi. Aliquam vestibulum quis purus et interdum.";
        $this->generateParticipants();
        $participantsArray = array();
        $participantsId = $this->connection->query("SELECT id
                                                    FROM participant 
                                                    where id != '" . TEST_PARTICIPANT . "'");
        while ($row = $participantsId->fetch_assoc()) {
            $participantsArray[] = $row['id'];
        }
        $messageFrom = TEST_PARTICIPANT;
        for ($c = 1; $c < 10; $c++) {
            $this->generateConversation($c);

            for ($m = 1; $m < 10; $m++) {
                $messageTo = $participantsArray[rand(1, count($participantsArray) - 1)];
                if ($m % 2 == 0) {
                    $this->connection->query("INSERT INTO messages (conversation_id, message_from, message_to, message_text, date_add) VALUES
                            ('" . $c . "', '" . $messageFrom . "', '" . $messageTo . "', '" . $messageText . "', '" . $this->dateAdd . "')");
                } else {
                    $this->connection->query("INSERT INTO messages (conversation_id, message_from, message_to, message_text, date_add) VALUES
                            ('" . $c . "', '" . $messageTo . "', '" . $messageFrom . "', '" . $reply . "', '" . $this->dateAdd . "')");
                }
                $this->conversationParticipant($c, [$messageFrom, $messageTo]);

            }
        }
        $this->connection->close();

    }

    private function generateParticipants()
    {

        $this->connection->query("INSERT INTO participant (id, name, avatar, date_add) VALUES 
                                ('" . TEST_PARTICIPANT . "', 'User Test','https://via.placeholder.com/40', '" . $this->dateAdd . "')");
        for ($i = 1; $i < 10; $i++) {
            if ($i != TEST_PARTICIPANT)
                $this->connection->query("INSERT INTO participant (id, name, avatar, date_add) VALUES 
                                ($i, 'Participant_" . $i . "','https://via.placeholder.com/40', '" . $this->dateAdd . "')");
        }

    }


    private function generateConversation($index)
    {
        $dateUpdated = new DateTime($this->dateAdd);
        $dateUpdated->add(new DateInterval('P1D'));
        $this->connection->query("INSERT INTO conversation (id, date_add, date_updated) VALUES 
                                ($index, '" . $this->dateAdd . "','" . $dateUpdated->format('Y-m-d H:i:s') . "' )");

        $this->generateTagsPerConversation($index);


    }

    private function conversationParticipant($conversationId, $participants)
    {
        foreach ($participants as $participant) {
            $this->connection->query("INSERT INTO conversation_participant (conversation_id, participant_id) VALUES 
                                    ('" . $conversationId . "', '" . $participant . "')");
        }

    }

    private function generateTagsPerConversation($conversationId)
    {
        $tagsId = $this->connection->query("SELECT id
                                            FROM tags");
        $tagsArray = array();
        while ($row = $tagsId->fetch_assoc()) {
            $tagsArray[] = $row['id'];
        }
        $randomTag = count($tagsArray) != 0 ? $tagsArray[rand(1, count($tagsArray) - 1)] : 1;

        for ($i = 1; $i < 3; $i++) {
            $this->connection->query("INSERT INTO tags (name, date_add) values ('Tag_" . $i . "', '" . $this->dateAdd . "')");
        }
        $this->connection->query("INSERT INTO conversation_tags (conversation_id, tags_id) values ('" . $conversationId . "', '" . $randomTag . "')");
    }
}
