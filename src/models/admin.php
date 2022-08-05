<?php
class Admin
{
    private INT $idAdmin;
    private string $firstName;
    private string $lastName;
    private string $password;

    //getters
    public function GetIdAdmin($id)
    {
        return $this->idAdmin;
    }
    public function GetFirstName($firstName)
    {
        return $this->firstName;
    }
    public function GetLastName($lastName)
    {
        return $this->lastName;
    }
    public function GetPassword($password)
    {
        return $this->password;
    }

    //setters

    public function SetIdAdmin($id)
    {
        return $this->idAdmin = $id;
    }
    public function SetFirstName($firstName)
    {
        return $this->firstName = $firstName;
    }
    public function SetLastName($lastName)
    {
        return $this->lastName = $lastName;
    }
    public function SetPassword($password)
    {
        return $this->password = $password;
    }
}


