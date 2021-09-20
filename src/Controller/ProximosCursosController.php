<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProximosCursosController extends AbstractController
{
    #[Route('/proximos/cursos', name: 'proximos_cursos')]
    public function index(): Response
    {
        return $this->render('proximos_cursos/index.html.twig', [
            'controller_name' => 'ProximosCursosController',
        ]);
    }
}
