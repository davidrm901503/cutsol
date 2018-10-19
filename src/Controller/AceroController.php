<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/acero")
 */
class AceroController extends AbstractController
{

    /**
     * @Route("/corte", name="acero_corte")
     */
    public function corte()
    {
        return $this->render('acero/corte.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }

    /**
     * @Route("/setup", name="acero_setup")
     */
    public function setup()
    {
        return $this->render('acero/setup.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
    /**
     * @Route("/produccion", name="acero_produccion")
     */
    public function produccion()
    {
        return $this->render('acero/produccion.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
    /**
     * @Route("/chapa", name="acero_chapa")
     */
    public function chapa()
    {
        return $this->render('acero/chapa.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
    /**
     * @Route("/pintura", name="acero_pintura")
     */
    public function pintura()
    {
        return $this->render('acero/pintura.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
    /**
     * @Route("/marketing", name="acero_marketing")
     */
    public function marketing()
    {
        return $this->render('acero/marketing.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
    /**
     * @Route("/costos", name="acero_costos")
     */
    public function costos()
    {
        return $this->render('acero/costos.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }

}
