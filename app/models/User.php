<?php

class User
{
    private int $id;
    private string $name;
    private int $age;
    private string $phone;

    public function __construct($id, $name, $age, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName($name) : void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone($phone) : void
    {
        $this->phone = $phone;
    }

}

?>