<?php

namespace App\Controller;

use App\Entity\Cedula;
use App\Form\CedulaType;
use App\Repository\CedulaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cedula")
 */
class CedulaController extends AbstractController
{
    /**
     * @Route("/", name="cedula_index", methods={"GET"})
     */
    public function index(CedulaRepository $cedulaRepository): Response
    {
        return $this->render('cedula/index.html.twig', [
            'cedulas' => $cedulaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cedula_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cedula = new Cedula();
        $form = $this->createForm(CedulaType::class, $cedula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cedula);
            $entityManager->flush();

            return $this->redirectToRoute('cedula_index');
        }

        return $this->render('cedula/new.html.twig', [
            'cedula' => $cedula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cedula_show", methods={"GET"})
     */
    public function show(Cedula $cedula): Response
    {
        return $this->render('cedula/show.html.twig', [
            'cedula' => $cedula,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cedula_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cedula $cedula): Response
    {
        $form = $this->createForm(CedulaType::class, $cedula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cedula_index');
        }

        return $this->render('cedula/edit.html.twig', [
            'cedula' => $cedula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cedula_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cedula $cedula): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cedula->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cedula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cedula_index');
    }
}
