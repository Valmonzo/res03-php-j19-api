<?php

class User {
    private ?int $id;
    private string $username;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(?int $id, string $username, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function toArray() : array
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email
        ]
    }
}