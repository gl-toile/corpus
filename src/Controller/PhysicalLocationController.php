<?php

namespace App\Controller;

use App\Entity\PhysicalLocation;
use App\Form\PhysicalLocationType;
use App\Repository\PhysicalLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/physical/location')]
class PhysicalLocationController extends AbstractController
{
    #[Route('/', name: 'app_physical_location_index', methods: ['GET'])]
    public function index(PhysicalLocationRepository $physicalLocationRepository): Response
    {
        return $this->render('physical_location/index.html.twig', [
            'physical_locations' => $physicalLocationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_physical_location_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PhysicalLocationRepository $physicalLocationRepository): Response
    {
        $physicalLocation = new PhysicalLocation();
        $form = $this->createForm(PhysicalLocationType::class, $physicalLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $physicalLocationRepository->add($physicalLocation);
            return $this->redirectToRoute('app_physical_location_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('physical_location/new.html.twig', [
            'physical_location' => $physicalLocation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_physical_location_show', methods: ['GET'])]
    public function show(PhysicalLocation $physicalLocation): Response
    {
        return $this->render('physical_location/show.html.twig', [
            'physical_location' => $physicalLocation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_physical_location_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhysicalLocation $physicalLocation, PhysicalLocationRepository $physicalLocationRepository): Response
    {
        $form = $this->createForm(PhysicalLocationType::class, $physicalLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $physicalLocationRepository->add($physicalLocation);
            return $this->redirectToRoute('app_physical_location_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('physical_location/edit.html.twig', [
            'physical_location' => $physicalLocation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_physical_location_delete', methods: ['POST'])]
    public function delete(Request $request, PhysicalLocation $physicalLocation, PhysicalLocationRepository $physicalLocationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$physicalLocation->getId(), $request->request->get('_token'))) {
            $physicalLocationRepository->remove($physicalLocation);
        }

        return $this->redirectToRoute('app_physical_location_index', [], Response::HTTP_SEE_OTHER);
    }
}
