<?php

namespace App\Repository;

use App\Entity\ExerciseOperacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExerciseOperacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExerciseOperacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExerciseOperacion[]    findAll()
 * @method ExerciseOperacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExerciseOperacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExerciseOperacion::class);
    }

    // /**
    //  * @return ExerciseOperacion[] Returns an array of ExerciseOperacion objects
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
    public function findOneBySomeField($value): ?ExerciseOperacion
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
