<?php

namespace App\Repository;

use App\Entity\OperacionCedula;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperacionCedula|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperacionCedula|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperacionCedula[]    findAll()
 * @method OperacionCedula[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionCedulaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperacionCedula::class);
    }

    // /**
    //  * @return OperacionCedula[] Returns an array of OperacionCedula objects
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
    public function findOneBySomeField($value): ?OperacionCedula
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
