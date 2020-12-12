<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $session = new Session();
        
        $datos=array(
            'puntaje'=> 0,
            'saldo'=>12000000,
            'lista'=>'',
            'ejercicios'=>0,
            'registros_id'=>[],
            'registros_transaccion'=>[],
            'registros_cuenta'=>[],
            'registros_estado'=>[],
            'registros_cuenta'=>[],
            'registros_serie'=>[],
            'registros_entrada_salida'=>[],
            'registros_monto'=>[],
            'registros_tipo_operacion'=>[]
            );
        $session->set("sesion",$datos);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
