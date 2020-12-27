<?php

namespace App\Controller;

use App\Entity\Cedula;
use App\Form\CedulaType;
use App\Repository\CedulaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
/**
 * @Route("/cedula")
 */
class CedulaController extends AbstractController
{

    public function index(CedulaRepository $cedulaRepository): Response
    {
        return $this->render('cedula/index.html.twig', [
            'cedulas' => $cedulaRepository->findAll(),
        ]);
    }
   
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $cedula = new Cedula();
        $form = $this->createForm(CedulaType::class, $cedula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $brochureFile = $form->get('ruta_imagen')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('archivo_img_carnet'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new \Exception( 'Hubo un error en la subida de archivo');
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $cedula->setRutaImagen($newFilename);
            }
            $entityManager->persist($cedula);
            $entityManager->flush();

            return $this->redirectToRoute('cedulas');
        }

        return $this->render('cedula/new.html.twig', [
            'cedula' => $cedula,
            'form' => $form->createView(),
        ]);
    }
    
    public function show(Cedula $cedula): Response
    {
        return $this->render('cedula/show.html.twig', [
            'cedula' => $cedula,
        ]);
    }


    public function edit(Request $request, Cedula $cedula): Response
    {
        $form = $this->createForm(CedulaType::class, $cedula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cedulas');
        }

        return $this->render('cedula/edit.html.twig', [
            'cedula' => $cedula,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Cedula $cedula): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cedula->getRut(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cedula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cedulas');
    }
}
