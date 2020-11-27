<?php

namespace App\Repository;

use App\Entity\OperacionDeposito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperacionDeposito|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperacionDeposito|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperacionDeposito[]    findAll()
 * @method OperacionDeposito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionDepositoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperacionDeposito::class);
    }

    // /**
    //  * @return OperacionDeposito[] Returns an array of OperacionDeposito objects
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
    public function findOneBySomeField($value): ?OperacionDeposito
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
