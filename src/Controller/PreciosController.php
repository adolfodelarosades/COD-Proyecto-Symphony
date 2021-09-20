<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PreciosController extends AbstractController
{
    #[Route('/precios', name: 'precios')]
    public function index(): Response
    {
        return $this->render('precios/index.html.twig', [
            'controller_name' => 'PreciosController',
        ]);
    }
}
