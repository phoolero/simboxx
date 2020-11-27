<?php

namespace App\Repository;

use App\Entity\OperacionCheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperacionCheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperacionCheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperacionCheque[]    findAll()
 * @method OperacionCheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionChequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperacionCheque::class);
    }

    // /**
    //  * @return OperacionCheque[] Returns an array of OperacionCheque objects
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
    public function findOneBySomeField($value): ?OperacionCheque
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
