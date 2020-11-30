<?php

namespace App\Repository;

use App\Entity\Operacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Operacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Operacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Operacion[]    findAll()
 * @method Operacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Operacion::class);
    }

    public function obtenerChequeOperacion(int $operacion): array{
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT banco.nombre AS 'banco', sucursal.codigo_plaza, sucursal.nombre AS 'sucursal', cuenta.id AS 'cuenta', cuenta.nombre AS 'titular', cuenta.firma, cheque.serie, cheque.beneficiario, 
                    cheque.monto_numero, cheque.monto_letras, cheque.tarjado_orden, cheque.tarjado_al_portador, cheque.firma_titular,
                    cheque.firma_beneficiario_atravesada, cheque.cruzado, cheque.cruzado_especial_banco, cheque.numero_dias_cheque,
                    cheque.numero_dias_revalidacion, cheque.revalidacion_firma, cheque.error
                FROM banco, sucursal, cuenta, cheque, operacion_cheque, operacion
                WHERE operacion = :operacion
                AND operacion_cheque.operacion = operacion.id
                AND operacion_cheque.cheque = cheque.serie
                AND cheque.cuenta = cuenta.id
                AND cuenta.sucursal_id = sucursal.id
                AND banco.id = sucursal.banco_id";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute(['operacion' => $operacion]);

                return $stmt->fetchAllAssociative();
    }

    public function obtenerCedulaOperacion(int $operacion): array{
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT cedula.ruta_imagen FROM cedula, operacion_cedula, operacion
                WHERE operacion = :operacion
                AND operacion.id = operacion_cedula.operacion
                AND cedula.rut = operacion_cedula.cedula";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute(['operacion' => $operacion]);

                return $stmt->fetchAllAssociative();
    }

    public function obtenerDepositoOperacion(int $operacion): array{
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT deposito.numero_dias_deposito, deposito.tipo_deposito, deposito.nombre_titular, 
                deposito.nombre_depositante, deposito.numero_documentos, deposito.numero_cuenta, deposito.total 
                from deposito, operacion_deposito 
                WHERE deposito.id = operacion_deposito.deposito 
                AND operacion_deposito.id = :operacion";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute(['operacion' => $operacion]);

                return $stmt->fetchAllAssociative();
    }

    //entrega datos de la operacion
    public function obtenerOperacion(int $operacion): array{
        $conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT operacion.tipo_operacion, tipo_operacion.nombre, operacion.mensaje_cliente
                FROM operacion, tipo_operacion
                WHERE operacion.id = :operacion
                AND operacion.tipo_operacion = tipo_operacion.id";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute(['operacion' => $operacion]);

                return $stmt->fetchAllAssociative();
    }    

    // /**
    //  * @return Operacion[] Returns an array of Operacion objects
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
    public function findOneBySomeField($value): ?Operacion
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
