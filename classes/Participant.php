<?php

class Participant
{
    public $name;
    public $avatar;
    public $dateAdd;

    /**
     * Participant constructor.
     * @param $name
     * @param $avatar
     * @param $dateAdd
     */
    public function __construct($name, $avatar, $dateAdd)
    {
        $this->name = $name;
        $this->avatar = $avatar;
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
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
