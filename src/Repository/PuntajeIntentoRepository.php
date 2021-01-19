<?php

namespace App\Repository;

use App\Entity\PuntajeIntento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PuntajeIntento|null find($id, $lockMode = null, $lockVersion = null)
 * @method PuntajeIntento|null findOneBy(array $criteria, array $orderBy = null)
 * @method PuntajeIntento[]    findAll()
 * @method PuntajeIntento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntajeIntentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PuntajeIntento::class);
    }
    public function recordAlumno(int $alumno): array{
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT distinct operacion , puntaje, intento FROM `puntaje_intento` WHERE alumno = :alumno;";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute(['alumno' => $alumno]);

        return $stmt->fetchAllAssociative();
    }
    // /**
    //  * @return PuntajeIntento[] Returns an array of PuntajeIntento objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PuntajeIntento
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
