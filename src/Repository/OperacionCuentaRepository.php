<?php

namespace App\Repository;

use App\Entity\OperacionCuenta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperacionCuenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperacionCuenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperacionCuenta[]    findAll()
 * @method OperacionCuenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionCuentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperacionCuenta::class);
    }

    // /**
    //  * @return OperacionCuenta[] Returns an array of OperacionCuenta objects
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
    public function findOneBySomeField($value): ?OperacionCuenta
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
