<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/home/{nom}", name="app_front")
     */
    public function index($nom): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => $nom,
        ]);
    }
    public function home(ArtisteRepository $artisteRepository, MovieRepository $movieRepository): Response
    {

        $artistes = $artisteRepository->findAll();
        $movies = $movieRepository->findAll();

        return $this->render('front/.home.html.twig', [
            'artistes' => $artistes,
            'movies' => $movies
        ]);
    }
}
