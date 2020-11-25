<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Entity\Cuenta;
use App\Entity\Sucursal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class VerChequeController extends AbstractController
{
    /**
     * @Route("/ver/cheque", name="ver_cheque")
     */
    public function index(Request $request): Response
    {
		$em = $this->getDoctrine()->getManager();

		$cheque = $em->getRepository(Cheque::class)->find(1);
		//ver como se define chequeInfoLarga en ChequeRepository
		$datacheque = $em->getRepository(Cheque::class)->chequeInfoLarga(1);
		$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta(7689162);
        return $this->render('ver_cheque/index.html.twig', [
			'cheques' => $cheque,
			'datoscuenta' => $datosCuenta,
			'datacheque' => $datacheque
        ]);
	}
	//funcion AJAX
	/**
	 * @Route("/datosCuenta", options={"expose"=true}, name="datosCuenta")
	 */
	public function getDatosCuenta(Request $request){
		if($request->isXmlHttpRequest()){
			$em = $this->getDoctrine()->getManager();
			//$user = $this->getUser();
			$cuenta = $request->request->get('cuenta');
			//llega como arreglo aún
			//$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta($cuenta);
			$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta(7689162);
			
			//debe agregarse que pasa si la cuenta no existe
			
			return new JsonResponse(["nombre" => $datosCuenta["nombre"], "firma" => $datosCuenta["firma"]]);

		}
	}
	/*
	public function index(Request $request): Response{
		$greet = '';
		if($name = $request->query->get('hello')){
			$greet = sprintf('<h1>Hola ' . $name. '</h1>');
		}
	}*/
}
