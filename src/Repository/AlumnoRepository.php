<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method Alumno|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alumno|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alumno[]    findAll()
 * @method Alumno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlumnoRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumno::class);
    }
    public function alumnosEmpresa($id){
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT *
				from alumno
				where institucion = :id";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetchAllAssociative();
    }
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof Alumno) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }
    // /**
    //  * @return Alumno[] Returns an array of Alumno objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alumno
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
