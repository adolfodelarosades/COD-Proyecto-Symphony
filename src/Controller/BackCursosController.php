<?php

namespace App\Controller;

use App\Repository\CursoRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackCursosController extends AbstractController
{
    #[Route('/back/cursos', name: 'back_cursos')]
    public function index(CursoRepository $cursoRepository): Response
    {
        $cursos = $cursoRepository->findAll();

        return $this->render('back_cursos/index.html.twig', [
            'cursos' => $cursos,
        ]);
    }
}
