<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Entity\Cuenta;
use App\Entity\Sucursal;
use App\Form\Cheque1Type;
use App\Repository\ChequeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ChequeController extends AbstractController
{
  
    public function index(ChequeRepository $chequeRepository): Response
    {
        return $this->render('cheque/index.html.twig', [
            'cheques' => $chequeRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $cheque = new Cheque();
        $form = $this->createForm(Cheque1Type::class, $cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cheque);
            $entityManager->flush();

            return $this->redirectToRoute('cheques');
        }

        return $this->render('cheque/new.html.twig', [
            'cheque' => $cheque,
            'form' => $form->createView(),
        ]);
    }


    public function show(Cheque $cheque): Response
    {
        return $this->render('cheque/show.html.twig', [
            'cheque' => $cheque,
        ]);
    }

    public function edit(Request $request, Cheque $cheque): Response
    {
        $form = $this->createForm(Cheque1Type::class, $cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cheques');
        }

        return $this->render('cheque/edit.html.twig', [
            'cheque' => $cheque,
            'form' => $form->createView(),
        ]);
    }

   
    public function delete(Request $request, Cheque $cheque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cheque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cheque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cheques');
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
			$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta($cuenta);
			//$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta($request);
			
			//debe agregarse que pasa si la cuenta no existe
			
			return new JsonResponse(["nombre" => $datosCuenta["nombre"], "firma" => $datosCuenta["firma"]]);

		}
	}
}