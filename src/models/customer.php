<?php
class Customer
{

    private int $idCustomer;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $address;
    private string $phone;

    //getter
    public function getidCustomer()
    {
        return $this->idCustomer;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    //setter
    public function setidCustomer($id)
    {
        return $this->idCustomer = $id;
    }

    public function setFirstName($firstName)
    {
        return $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        return $this->lastName = $lastName;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }
    public function setAddress($address)
    {
        return $this->address = $address;
    }
    public function setPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function findCustomers()
    {
        require('../src/pdo/PDO.php');
        $customersDB = $db->prepare("SELECT id_customer, first_name, last_name, email, address, phone FROM customer");
        $customersDB->execute();
        $customers = $customersDB->fetchAll();
        return $customers;
    }
}