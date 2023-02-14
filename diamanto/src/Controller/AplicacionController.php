<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AplicacionController extends AbstractController
{
    /**
     * @Route("/aplicacion", name="app_aplicacion")
     */
    public function index(): Response
    {
        return $this->render('aplicacion/index.html.twig', [
            'controller_name' => 'AplicacionController',
        ]);
    }
}
