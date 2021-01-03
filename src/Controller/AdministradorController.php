<?php

namespace App\Controller;

use App\Entity\Administrador;
use App\Entity\Empresa;
use App\Form\AdministradorType;
use App\Repository\AdministradorRepository;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdministradorController extends AbstractController
{
    public function index(AdministradorRepository $administradorRepository): Response
    {
        $manager = $this->getDoctrine()->getManager();
        return $this->render('administrador/index.html.twig', [
            'administradores' => $administradorRepository->findAll(),
        ]);
    }
 
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $administrador = new Administrador();
        $form = $this->createForm(AdministradorType::class, $administrador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $administrador->setRoles(['ROLE_EMPRESA']);
            $administrador->setPassword($passwordEncoder->encodePassword($administrador, $form['password']->getData()));
            $entityManager->persist($administrador);
            $entityManager->flush();
        
            return $this->redirectToRoute('administradores');
        }
        

        return $this->render('administrador/new.html.twig', [
            'administrador' => $administrador,
            'form' => $form->createView(),
        ]);
    }
    public function show(Administrador $administrador): Response
    {
        return $this->render('administrador/show.html.twig', [
            'administrador' => $administrador,
        ]);
    }
    public function edit(Request $request, Administrador $administrador,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(AdministradorType::class, $administrador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $administrador->setPassword($passwordEncoder->encodePassword($administrador, $form['password']->getData()));
            $entityManager->persist($administrador);
            $entityManager->flush();

            return $this->redirectToRoute('administrador');
        }

        return $this->render('administrador/edit.html.twig', [
            'administrador' => $administrador,
            'form' => $form->createView(),
        ]);
    }
    public function delete(Request $request, Administrador $administrador): Response
    {
        if ($this->isCsrfTokenValid('delete'.$administrador->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($administrador);
            $entityManager->flush();
        }

        return $this->redirectToRoute('administrador');
    }

}

