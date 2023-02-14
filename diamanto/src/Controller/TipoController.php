<?php

namespace App\Controller;

use App\Entity\Tipo;
use App\Form\TipoType;
use App\Repository\TipoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo")
 */
class TipoController extends AbstractController
{
    /**
     * @Route("/", name="app_tipo_index", methods={"GET"})
     */
    public function index(TipoRepository $tipoRepository): Response
    {
        return $this->render('tipo/index.html.twig', [
            'tipos' => $tipoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_tipo_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TipoRepository $tipoRepository): Response
    {
        $tipo = new Tipo();
        $form = $this->createForm(TipoType::class, $tipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tipoRepository->add($tipo, true);

            return $this->redirectToRoute('app_tipo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo/new.html.twig', [
            'tipo' => $tipo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_tipo_show", methods={"GET"})
     */
    public function show(Tipo $tipo): Response
    {
        return $this->render('tipo/show.html.twig', [
            'tipo' => $tipo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_tipo_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tipo $tipo, TipoRepository $tipoRepository): Response
    {
        $form = $this->createForm(TipoType::class, $tipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tipoRepository->add($tipo, true);

            return $this->redirectToRoute('app_tipo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo/edit.html.twig', [
            'tipo' => $tipo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_tipo_delete", methods={"POST"})
     */
    public function delete(Request $request, Tipo $tipo, TipoRepository $tipoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipo->getId(), $request->request->get('_token'))) {
            $tipoRepository->remove($tipo, true);
        }

        return $this->redirectToRoute('app_tipo_index', [], Response::HTTP_SEE_OTHER);
    }
}
