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

    public function new(Request $request): Response
    {
		$banco = new Banco();
		$form = $this->createForm(BancoType::class, $banco);
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($banco);
			$em->flush();
			$this->addFlash('exito', 'Se ha agregado el banco.');
			return $this->redirectToRoute('bancos');
		}
        return $this->render('banco/new.html.twig', [
            'banco' => $banco,
			'form'=>$form->createView()
        ]);
	}
	

    public function show(Banco $banco): Response
    {
        return $this->render('banco/show.html.twig', [
            'banco' => $banco,
        ]);
    }

    public function edit(Request $request, Banco $banco): Response
    {
        $form = $this->createForm(BancoType::class, $banco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bancos');
        }

        return $this->render('banco/edit.html.twig', [
            'banco' => $banco,
            'form' => $form->createView(),
        ]);
    }

   
    public function delete(Request $request, Banco $banco): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banco->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($banco);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bancos');
    }
}
