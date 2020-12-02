<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Repository\OperacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class OperacionController extends AbstractController
{
    /**
     * @Route("/operacion", name="operacion")
     */
    public function index(Request $request): Response
    {

        $session = new Session(new NativeSessionStorage(), new AttributeBag());
        
        $datos=array(
            'puntaje'=>0,
            'saldo'=>1200000,
            'registros'=>0
        );
        $session->set("sesion",$datos);
        $varSe = $session;
        $em = $this->getDoctrine()->getManager();
        
        $id_operacion = 4;
        $cho = $em->GetRepository(Operacion::class)->obtenerChequeOperacion($id_operacion);
        $ceo = $em->GetRepository(Operacion::class)->obtenerCedulaOperacion($id_operacion);
        $deo = $em->GetRepository(Operacion::class)->obtenerDepositoOperacion($id_operacion);
        $opo = $em->GetRepository(Operacion::class)->obtenerOperacion($id_operacion);

        return $this->render('operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
            'cheque_operacion' => $cho,
            'cedula_operacion' => $ceo,
            'deposito_operacion' => $deo,
            'operacion' => $opo,
            'sesion' => $varSe
        ]);
    }

    public function darPuntaje(Request $request){
           
        //aqui agarro la sesion
            $session = $request->getSession();
            $varSe = $session->get("sesion");
        
            //aqui agarro los datos del ajax
            $datos = $request->request->get("datos");
            //aqui cambio acumulo el puntaje y  los registros
            $datos['puntaje']=$varSe['puntaje']+ $datos['puntaje'];
            $datos['registro']=$varSe['registros']+ $datos['registro'];

            //actulizando el arreglo de la sesion
            $varSe['puntaje'] =  $datos['puntaje'];
            $varSe['registros'] = $datos['registro'];
            $varSe['saldo'] =$varSe['saldo']- $datos['monto'];
            $session->clear();
            $session->set("sesion",$varSe);
            
            return new JsonResponse($datos);
     
    }

}
