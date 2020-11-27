<?php

namespace App\Repository;

use App\Entity\Cedula;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cedula|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cedula|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cedula[]    findAll()
 * @method Cedula[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CedulaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cedula::class);
    }

    // /**
    //  * @return Cedula[] Returns an array of Cedula objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cedula
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
