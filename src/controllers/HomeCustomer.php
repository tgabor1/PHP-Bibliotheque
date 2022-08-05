<?php

require_once("../src/models/customer.php");
require_once("../src/models/Loan.php");


class HomeCustomer
{

    public function customers()
    {

        $Customer = new Customer();
        $customers = $Customer->findCustomers();

        $Loan = new Loan();
        // var_dump($customers);
        
        require("../templates/membres.php");
    }
}