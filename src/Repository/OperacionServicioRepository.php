<?php

namespace App\Repository;

use App\Entity\OperacionServicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperacionServicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperacionServicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperacionServicio[]    findAll()
 * @method OperacionServicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperacionServicio::class);
    }

    // /**
    //  * @return OperacionServicio[] Returns an array of OperacionServicio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OperacionServicio
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
