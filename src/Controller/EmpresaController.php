<?php

namespace App\Controller;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="empresa")
     */
    public function index(EmpresaRepository $empresaRepository): Response
    {
        return $this->render('empresa/index.html.twig', [
            'empresas' => $empresaRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($empresa);
            $entityManager->flush();

            return $this->redirectToRoute('cheque_index');
        }

        return $this->render('cheque/new.html.twig', [
            'cheque' => $cheque,
            'form' => $form->createView(),
        ]);
    }
}
