<?php

namespace App\Controller;

use App\Entity\Banco;
use App\Form\BancoType;
use App\Repository\BancoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BancoController extends AbstractController
{
   
	public function index(BancoRepository $bancoRepository): Response
    {
        return $this->render('banco/index.html.twig', [
            'bancos' => $bancoRepository->findAll(),
        ]);
    }

    public function crear(Request $request): Response
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
        return $this->render('banco/crear.html.twig', [
            'controller_name' => 'BancoController',
			'formulario'=>$form->createView()
        ]);
    }
}
