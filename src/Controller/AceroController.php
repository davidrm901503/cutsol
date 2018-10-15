<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AceroController extends AbstractController
{

    /**
     * @Route("/acero", name="acero")
     */
    public function acero()
    {
        return $this->render('acero/acero.html.twig', [
            'controller_name' => 'Parametros Acero',
        ]);
    }
}
