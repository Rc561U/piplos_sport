<?php

namespace App\Service;

use App\Repository\AplicationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class AplicationService
{
    public function __construct(private readonly AplicationRepository $aplicationRepository)
    {
    }

    function getAllAplications()
    {
        return $this->aplicationRepository->findAll();
//        return 'test';
    }

    function addNewApplication(EntityManagerInterface $entityManager){


    }
}