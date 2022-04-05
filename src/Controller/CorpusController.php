<?php

namespace App\Controller;

use App\Entity\Corpus;
use App\Form\CorpusType;
use App\Repository\CorpusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/corpus")
 */
class CorpusController extends AbstractController
{
    /**
     * @Route("/", name="app_corpus_index", methods={"GET"})
     */
    public function index(CorpusRepository $corpusRepository): Response
    {
        return $this->render('corpus/index.html.twig', [
            'corpuses' => $corpusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_corpus_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CorpusRepository $corpusRepository): Response
    {
        $corpu = new Corpus();
        $form = $this->createForm(CorpusType::class, $corpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $corpusRepository->add($corpu);
            return $this->redirectToRoute('app_corpus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('corpus/new.html.twig', [
            'corpu' => $corpu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_corpus_show", methods={"GET"})
     */
    public function show(Corpus $corpu): Response
    {
        return $this->render('corpus/show.html.twig', [
            'corpu' => $corpu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_corpus_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Corpus $corpu, CorpusRepository $corpusRepository): Response
    {
        $form = $this->createForm(CorpusType::class, $corpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $corpusRepository->add($corpu);
            return $this->redirectToRoute('app_corpus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('corpus/edit.html.twig', [
            'corpu' => $corpu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_corpus_delete", methods={"POST"})
     */
    public function delete(Request $request, Corpus $corpu, CorpusRepository $corpusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$corpu->getId(), $request->request->get('_token'))) {
            $corpusRepository->remove($corpu);
        }

        return $this->redirectToRoute('app_corpus_index', [], Response::HTTP_SEE_OTHER);
    }
}
