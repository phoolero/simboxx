<?php

namespace App\Controller;
use App\Entity\Alumno;
use App\Entity\Empresa;
use App\Form\AlumnoType;
use App\Repository\AlumnoRepository;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AlumnoController extends AbstractController
{
    /**
     * @Route("/alumno", name="alumno")
     */
    public function index(AlumnoRepository $alumnoRepository, EmpresaRepository $empresaRepository): Response
    {
        $manager = $this->getDoctrine()->getManager();
        return $this->render('alumno/index.html.twig', [
            'alumnos' => $alumnoRepository->findAll(),
            'empresas' => $empresaRepository->findAll()
        ]);
    }

    public function obtenerAlumnosEmpresa(Request $request){
        if($request->isXmlHttpRequest()){
			$em = $this->getDoctrine()->getManager();
			//$user = $this->getUser();
			$empresa = $request->request->get('institucion');
			//llega como arreglo aún
			$datosCuenta = $em->getRepository(Alumno::class)->alumnosEmpresa($empresa);
			//$datosCuenta = $em->getRepository(Cuenta::class)->getDatosCuenta($request);
			
			//debe agregarse que pasa si la cuenta no existe
			return new JsonResponse($datosCuenta);

		}
    }
}
