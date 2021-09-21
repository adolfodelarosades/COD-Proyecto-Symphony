<?php

namespace App\Controller;

use App\Repository\PasoRepository;
use App\Repository\CursoRepository;
use App\Repository\ProfesorRepository;
use App\Repository\SuscripcionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackHomeController extends AbstractController
{
    #[Route('/back/home', name: 'back_home')]
    public function index(CursoRepository $cursoRepository, 
                          ProfesorRepository $profesorRepository,
                          PasoRepository $pasosRepository,
                          SuscripcionRepository $suscripcionRepository): Response
    {
        $noCursos = count($cursoRepository->findAll());
        $noProfesores = count($profesorRepository->findAll());
        $noPasos = count($pasosRepository->findAll());
        $noSuscripciones = count($suscripcionRepository->findAll());

        return $this->render('back_home/index.html.twig', [
            'noCursos' => $noCursos,
            'noProfesores' => $noProfesores,
            'noPasos' => $noPasos,
            'noSuscripciones' => $noSuscripciones
        ]);
    }
}
