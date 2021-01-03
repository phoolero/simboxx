<?php

namespace App\Repository;

use App\Entity\EjercicioOperacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EjercicioOperacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method EjercicioOperacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method EjercicioOperacion[]    findAll()
 * @method EjercicioOperacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EjercicioOperacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EjercicioOperacion::class);
    }

    // /**
    //  * @return EjercicioOperacion[] Returns an array of EjercicioOperacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EjercicioOperacion
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
