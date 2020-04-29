<?php

namespace App\Repository;

use App\Entity\Customer;
use Projet_3WA_PHP\AbstractRepository;

class CustomerRepository extends AbstractRepository
{

    public function __construct(string $typeDB = null)
    {
        parent::__construct($typeDB ?? 'mongodb');
    }

    public function add(Customer $customer)
    {
        $this->db->customers->insertOne($this->getEntity($customer));
    }
}