<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductoRepository;



class AplicacionController extends AbstractController
{
//    public function recogerProductos(MarcaRepository $productoRepository){
//         return $productoRepository->findAll();
//     }
    
    /**
     * @Route("/aplicacion", name="app_aplicacion")
     */
    public function index(ProductoRepository $producto): Response
    {
    
        return $this->render('aplicacion/index.html.twig', [
            'productos' => $producto->findAll()
        ]);
    }
}
