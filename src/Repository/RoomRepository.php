<?php

namespace App\Repository;

use App\Entity\Room;
use Projet_3WA_PHP\AbstractRepository;

class RoomRepository extends AbstractRepository
{
    public function __construct(string $typeDB = null)
    {
        parent::__construct($typeDB ?? 'mongodb');
    }

    public function add(Room $room)
    {
        $this->db->rooms->insertOne($this->getEntity($room));
    }
}