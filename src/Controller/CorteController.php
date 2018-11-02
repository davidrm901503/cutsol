<?php

namespace App\Controller;

use App\Entity\Corte;
use App\Form\CorteType;
use App\Repository\CorteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/corte")
 */
class CorteController extends AbstractController
{
    /**
     * @Route("/", name="corte_index", methods="GET")
     */
    public function index(CorteRepository $corteRepository): Response
    {
        return $this->render('corte/index.html.twig', ['cortes' => $corteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="corte_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $corte = new Corte();
        $form = $this->createForm(CorteType::class, $corte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($corte);
            $em->flush();

            return $this->redirectToRoute('corte_index');
        }

        return $this->render('corte/new.html.twig', [
            'corte' => $corte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corte_show", methods="GET")
     */
    public function show(Corte $corte): Response
    {
        return $this->render('corte/show.html.twig', ['corte' => $corte]);
    }

    /**
     * @Route("/{id}/edit", name="corte_edit", methods="GET|POST")
     */
    public function edit(Request $request, Corte $corte): Response
    {
        $form = $this->createForm(CorteType::class, $corte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('corte_edit', ['id' => $corte->getId()]);
        }

        return $this->render('corte/edit.html.twig', [
            'corte' => $corte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corte_delete", methods="DELETE")
     */
    public function delete(Request $request, Corte $corte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$corte->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($corte);
            $em->flush();
        }

        return $this->redirectToRoute('corte_index');
    }
}
