<?php

namespace App\Repository;

use App\Entity\Notitular;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Notitular|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notitular|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notitular[]    findAll()
 * @method Notitular[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotitularRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notitular::class);
    }

    // /**
    //  * @return Notitular[] Returns an array of Notitular objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Notitular
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
