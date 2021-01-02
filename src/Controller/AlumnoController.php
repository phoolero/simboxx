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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
   
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $alumno = new Alumno();
        $form = $this->createForm(AlumnoType::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $alumno->setRoles(['ROLE_USER']);
            $alumno->setPassword($passwordEncoder->encodePassword($alumno, $form['password']->getData()));
            $entityManager->persist($alumno);
            $entityManager->flush();
        
            return $this->redirectToRoute('alumnos');
        }
        

        return $this->render('alumno/new.html.twig', [
            'alumno' => $alumno,
            'form' => $form->createView(),
        ]);
    }
    public function show(Alumno $alumno): Response
    {
        return $this->render('alumno/show.html.twig', [
            'alumno' => $alumno,
        ]);
    }
    public function edit(Request $request, Alumno $alumno,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(AlumnoType::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $alumno->setPassword($passwordEncoder->encodePassword($alumno, $form['password']->getData()));
            $entityManager->persist($alumno);
            $entityManager->flush();

            return $this->redirectToRoute('alumnos');
        }

        return $this->render('alumno/edit.html.twig', [
            'alumno' => $alumno,
            'form' => $form->createView(),
        ]);
    }
    public function delete(Request $request, Alumno $alumno): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumno->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alumno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alumnos');
    }

}
