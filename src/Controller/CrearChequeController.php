<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Form\ChequeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CrearChequeController extends AbstractController
{
    /**
     * @Route("/crear/cheque", name="crear_cheque")
     */
    public function index(Request $request): Response
    {
		$cheque = new Cheque();
		$form = $this->createForm(ChequeType::class, $cheque);
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($cheque);
			$em->flush();
			$this->addFlash('exito', 'Se ha agregado el cheque.');
			return $this->redirectToRoute('crear_cheque');
		}
        return $this->render('crear_cheque/index.html.twig', [
            'controller_name' => 'CrearChequeController',
			'formulario'=>$form->createView()
        ]);
    }
}
