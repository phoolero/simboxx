<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Controller\IndiceController;
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

        $session = $request->getSession();
        $varSe = $session->get("sesion");
        $em = $this->getDoctrine()->getManager();
        $id_operacion = $em->GetRepository(Operacion::class)->obtenerOperacionRandom();

        $id_operacion[0]['id'] = 41;
        $id_servicio = 15224367;

        $cho = $em->GetRepository(Operacion::class)->obtenerChequeOperacion($id_operacion[0]['id']);
        $ceo = $em->GetRepository(Operacion::class)->obtenerCedulaOperacion($id_operacion[0]['id']);
        $deo = $em->GetRepository(Operacion::class)->obtenerDepositoOperacion($id_operacion[0]['id']);
        $seo = $em->GetRepository(Operacion::class)->obtenerServicioOperacion($id_operacion[0]['id']);
        $opo = $em->GetRepository(Operacion::class)->obtenerOperacion($id_operacion[0]['id']);
        $lis = $em->GetRepository(Operacion::class)->obtenerOperacion($id_operacion[0]['id']);

        return $this->render('operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
            'cheque_operacion' => $cho,
            'cedula_operacion' => $ceo,
            'deposito_operacion' => $deo,
            'operacion' => $opo,
            'servicio' => $seo,
            
            'sesion' => $varSe
        ]);
    }

    public function darPuntaje(Request $request){
           
        //aqui agarro la sesion
            $session = $request->getSession();
            $varSe = $session->get("sesion");
        
            //aqui agarro los datos del ajax
            $datos = $request->request->get("datos");

            //si el ejercicio tiene un error entonces solo acumula pts sino pushea los valores
            if(!isset($datos['registro'] )|| is_null($datos['registro'])){
                //solo acumulamos el puntaje
                $varSe['puntaje']= $varSe['puntaje']+$datos['puntaje'];
                //este registroUrl sirve para el parametro de la url del ejercicio sin afectar los registros
                $registroUrl=$registroUrl=count($varSe['registros_id'])+ 1;
            }else{

            //aqui cambio acumulo el puntaje y  los registros
            $varSe['puntaje']= $varSe['puntaje']+$datos['puntaje'];
            
            //si hay registros en el arreglo registros id aumenta sino comienza en 1
            $regis=count($varSe['registros_id']);
            $registroUrl=count($varSe['registros_id']);

            
            if(count($varSe['registros_id']) >0 ){
                $regis += $datos['registro'];
                $registroUrl+= $datos['registro'];
            }else{
                $regis=1;
                $registroUrl=1;
            }
           
            //saldo caja
            if($datos["entrada_salida"] == 'salida'){
               $varSe['saldo'] -= $datos["monto"];
            }else{
                $varSe['saldo'] += $datos["monto"];
            }

            //push los registros nuevos
            array_push($varSe['registros_id'],$regis);
            array_push($varSe['registros_transaccion'],$datos['transaccion']);
            array_push($varSe['registros_cuenta'],$datos['cuenta']);
            array_push($varSe['registros_estado'],$datos['estado']);
            array_push($varSe['registros_serie'],$datos['serie']);
            array_push($varSe['registros_entrada_salida'],$datos['entrada_salida']);
            array_push($varSe['registros_monto'],$datos['monto']);
            array_push($varSe['registros_tipo_operacion'],$datos['tipo_operacion']);
        }
            //set de valores a la sesion
            $session->set("sesion",$varSe);          
            
            return new JsonResponse(['url'=>$registroUrl+1]);
     
    }

    public function listChequePortador(Request $request, $id){
        $session = $request->getSession();
        $varSe = $session->get("sesion");
    
        $em = $this->getDoctrine()->getManager();
        //agarra todos las operaciones del ejercicio 1
        $lis = $em->GetRepository(Operacion::class)->obtenerOperacionesDeEjercicio(1);
        $varSe['ejercicios']= count($lis);
        $varSe['lista']= "ChequePortador";

        //si el parametro sobrepasa la cantidad de ejercicio(o dicho de otra forma no existe en el arreglo) imprime la vista finEjercicios
        if(!isset($lis[$id-1]['operacion'])){
            
            return $this->render('operacion/finEjercicios.html.twig',[
                'controller_name' => 'OperacionController',
                'sesion' => $varSe
            ]);
        }
        $id_servicio = 15224367;
        //-1 para que comience desde la posicion 0
        $cho = $em->GetRepository(Operacion::class)->obtenerChequeOperacion($lis[$id-1]["operacion"]);
        $ceo = $em->GetRepository(Operacion::class)->obtenerCedulaOperacion($lis[$id-1]["operacion"]);
        $deo = $em->GetRepository(Operacion::class)->obtenerDepositoOperacion($lis[$id-1]["operacion"]);
        $opo = $em->GetRepository(Operacion::class)->obtenerOperacion($lis[$id-1]["operacion"]);
        $seo = $em->GetRepository(Operacion::class)->obtenerServicioOperacion($lis[$id-1]["operacion"]);
        
        return $this->render('operacion/index.html.twig', [
            'controller_name' => 'OperacionController',
            'cheque_operacion' => $cho,
            'cedula_operacion' => $ceo,
            'deposito_operacion' => $deo,
            'operacion' => $opo,
            'sesion' => $varSe,
            'servicio' => $seo,
            'lista'=> $lis
        ]);
    }

}
