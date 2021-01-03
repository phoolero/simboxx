<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UsuarioType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{


    public function index(Request $request, \Symfony\Component\Security\Core\User\UserInterface $usuario): Response
    {  


        return $this->render('usuario/index.html.twig', [
            'usuario' => $usuario,
        
        ]);
    }

    public function editar(Request $request,\Symfony\Component\Security\Core\User\UserInterface $usuario)
    {
        $form= $this->createForm(UsuarioType::class, $usuario);
        //rellenar automatico
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('usuario',['email'=>$usuario->getEmail()]));
        }
        return $this->render('usuario/editar.html.twig', [
            'usuario' => $usuario,
            'form'=> $form->createView()
        ]);
    }
}
