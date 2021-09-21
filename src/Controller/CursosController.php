<?php

namespace App\Controller;

use App\Repository\CursoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CursosController extends AbstractController
{
    #[Route('/cursos', name: 'cursos')]
    public function index(CursoRepository $cursoRepository): Response
    {
        $cursos = $cursoRepository->findAll();

        return $this->render('cursos/index.html.twig', [
            'cursos' => $cursos,
        ]);
    }
}
