<?php

namespace App\Controller;

use App\Entity\Marketing;
use App\Form\MarketingType;
use App\Repository\MarketingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @Route("/marketing")
 */
class MarketingController extends AbstractController
{
    /**
     * @Route("/", name="marketing_index", methods="GET")
     */
    public function index(MarketingRepository $marketingRepository): Response
    {
        return $this->render('marketing/index.html.twig', ['marketings' => $marketingRepository->findAll()]);
    }

    /**
     * @Route("/new", name="marketing_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $marketing = new Marketing();
        $form = $this->createForm(MarketingType::class, $marketing);
        $form->handleRequest($request);
//        if  ($request->isXmlHttpRequest())

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marketing);
            $em->flush();

            return $this->redirectToRoute('marketing_index');
        }

        return $this->render('marketing/new.html.twig', [
            'marketing' => $marketing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marketing_show", methods="GET")
     */
    public function show(Marketing $marketing): Response
    {
        $encoders = [
            new JsonEncoder()
        ];
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $data = $serializer->serialize($marketing, 'json');
        return new JsonResponse([
            'marketing' => $data
        ], 200);
//        return $this->render('marketing/show.html.twig', ['marketing' => $marketing]);
    }

    /**
     * @Route("/{id}/edit", name="marketing_edit", methods="GET|POST")
     */
    public function edit(Request $request, Marketing $marketing): Response
    {
        $form = $this->createForm(MarketingType::class, $marketing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('marketing_edit', ['id' => $marketing->getId()]);
        }

        return $this->render('marketing/edit.html.twig', [
            'marketing' => $marketing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marketing_edit_ajax", methods="POST", options={"expose"=true})
     */
    public function editar(Request $request, $id): Response
    {
        $submittedToken = $request->request->get('token');
        if ($this->isCsrfTokenValid('editm', $submittedToken)) {

            $entityManager = $this->getDoctrine()->getManager();
            $marketing = $entityManager->getRepository(Marketing::class)->find($id);

            if (!$marketing) {
                throw $this->createNotFoundException(
                    'No marketing found for id ' . $id
                );
            }
            $marketing->setValor($request->request->get('valor'));
            $marketing->setCantidad($request->request->get('cantidad'));
            $marketing->setHoras($request->request->get('horas'));
            $marketing->setDias($request->request->get('dias'));
            $marketing->setMeses($request->request->get('meses'));
            $entityManager->flush();
            $response = new RedirectResponse('http://example.com/');
            return new JsonResponse([], Response::HTTP_OK);
        }
        return new JsonResponse([
            'error' => 'error'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("/{id}", name="marketing_delete", methods="DELETE")
     */
    public function delete(Request $request, Marketing $marketing): Response
    {
        if ($this->isCsrfTokenValid('delete' . $marketing->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marketing);
            $em->flush();
        }

        return $this->redirectToRoute('marketing_index');
    }
}
