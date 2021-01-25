<?php


class Message
{
    public $conversationId;
    public $messageFrom;
    public $messageTo;
    public $messageText;
    public $dateAdd;

    /**
     * Message constructor.
     * @param $conversationId
     * @param $messageFrom
     * @param $messageTo
     * @param $messageText
     * @param $dateAdd
     */
    public function __construct($conversationId, $messageFrom, $messageTo, $messageText, $dateAdd)
    {
        $this->conversationId = $conversationId;
        $this->messageFrom = $messageFrom;
        $this->messageTo = $messageTo;
        $this->messageText = $messageText;
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return mixed
     */
    public function getConversationId()
    {
        return $this->conversationId;
    }

    /**
     * @param mixed $conversationId
     */
    public function setConversationId($conversationId): void
    {
        $this->conversationId = $conversationId;
    }

    /**
     * @return mixed
     */
    public function getMessageFrom()
    {
        return $this->messageFrom;
    }

    /**
     * @param mixed $messageFrom
     */
    public function setMessageFrom($messageFrom): void
    {
        $this->messageFrom = $messageFrom;
    }

    /**
     * @return mixed
     */
    public function getMessageTo()
    {
        return $this->messageTo;
    }

    /**
     * @param mixed $messageTo
     */
    public function setMessageTo($messageTo): void
    {
        $this->messageTo = $messageTo;
    }

    /**
     * @return mixed
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param mixed $messageText
     */
    public function setMessageText($messageText): void
    {
        $this->messageText = $messageText;
    }

    /**
     * @return mixed
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * @param mixed $dateAdd
     */
    public function setDateAdd($dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }


}