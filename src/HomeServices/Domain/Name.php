<?php

namespace HomeServices;

class Name
{
    private $firstName;
    private $lastName;
    private $company;

    public function __construct(string $firstName, string $lastName, string $company = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
    }

    public function getDisplayName(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName . ' ' . $this->company;
    }
}
