<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Repository\OperacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OperacionController extends AbstractController
{
    /**
     * @Route("/operacion", name="operacion")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $cho = $em->GetRepository(Operacion::class)->obtenerChequeOperacion(1);
        $ceo = $em->GetRepository(Operacion::class)->obtenerCedulaOperacion(1);
        $opo = $em->GetRepository(Operacion::class)->obtenerOperacion(1);

        return $this->render('operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
            'cheque_operacion' => $cho,
            'cedula_operacion' => $ceo,
            'operacion' => $opo
        ]);
    }
}
