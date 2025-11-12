<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VeloController extends AbstractController
{
    #[Route('/velo', name: 'app_velo')]
    public function index(VeloRepository $veloRepository): Response
    {
        $velo = $veloRepository->findAllVelo();

        return $this->render('velo/index.html.twig', [
            'controller_name' => 'VeloController',
            'velos' => $velo
        ]);
    }

    #[Route('/mybike', name: 'app_mybike')]
    public function showMyBike(VeloRepository $veloRepository): Response
    {
        $myBike = $veloRepository->findOneBy([], ['id' => 'ASC']);

        return $this->render('velo/mybike.html.twig', [
            'myBike' => $myBike,
        ]);
    }

    #[Route('/velo/{id}', name: 'app_velo_show')]
    public function show(int $id, VeloRepository $veloRepository): Response
    {
        $velo = $veloRepository->find($id);

        if (!$velo) {
            throw $this->createNotFoundException('Vélo non trouvé');
        }

        return $this->render('velo/show.html.twig', [
            'velo' => $velo,
        ]);
    }
}
