<?php

namespace App\Controller;

use App\Entity\PuntajeIntento;
use App\Entity\OperacionEjercicio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
class PuntajeController extends AbstractController
{
  
    public function index(Request $request): Response
    {  
        
        $session = $request->getSession();
        $varSe = $session->get("sesion");
        $repo = $this->getDoctrine()->getRepository(PuntajeIntento::class);
        $puntajes = $repo->recordAlumno($varSe['alumno']);

        
        return $this->render('puntaje/index.html.twig', [
            'records' => $puntajes
        ]);
    }
}
