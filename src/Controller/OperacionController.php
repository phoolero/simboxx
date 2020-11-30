<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Repository\OperacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class OperacionController extends AbstractController
{
    /**
     * @Route("/operacion", name="operacion")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $id_operacion = 4;
        $cho = $em->GetRepository(Operacion::class)->obtenerChequeOperacion($id_operacion);
        $ceo = $em->GetRepository(Operacion::class)->obtenerCedulaOperacion($id_operacion);
        $deo = $em->GetRepository(Operacion::class)->obtenerDepositoOperacion($id_operacion);
        $opo = $em->GetRepository(Operacion::class)->obtenerOperacion($id_operacion);

        return $this->render('operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
            'cheque_operacion' => $cho,
            'cedula_operacion' => $ceo,
            'deposito_operacion' => $deo,
            'operacion' => $opo
        ]);
    }
}
