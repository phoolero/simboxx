<?php

namespace App\Controller;

use App\Entity\Banco;
use App\Form\BancoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CrearBancoController extends AbstractController
{
    /**
     * @Route("/crear/banco", name="crear_banco")
     */
    public function index(Request $request): Response
    {
		$banco = new Banco();
		$form = $this->createForm(BancoType::class, $banco);
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($banco);
			$em->flush();
			$this->addFlash('exito', 'Se ha agregado el banco.');
			return $this->redirectToRoute('crear_banco');
		}
        return $this->render('crear_banco/index.html.twig', [
            'controller_name' => 'CrearBancoController',
			'formulario'=>$form->createView()
        ]);
    }
}
