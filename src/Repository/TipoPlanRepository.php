<?php

namespace App\Repository;

use App\Entity\TipoPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoPlan[]    findAll()
 * @method TipoPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoPlan::class);
    }

    // /**
    //  * @return TipoPlan[] Returns an array of TipoPlan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoPlan
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
