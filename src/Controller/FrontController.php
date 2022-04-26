<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Repository\ArtisteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/front")
     */

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

        $artistes = $artisteRepository->findLastFive();
        $movies = $movieRepository->findfindLastFive();

        return $this->render('front/.home.html.twig', [
            'artistes' => $artistes,
            'movies' => $movies
        ]);
    }

    /**
     * @Route("/movies", name="front_movies")
     */

    public function frontMovies(MovieRepository $movieRepository, PaginatorInterface $paginator, Request $request)
    {

        $movies = $movieRepository->findAll();

        $pagination = $paginator->paginate(
            $movies,
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('front/movies.html.twig',[
            'pagination' => $pagination
        ]);

    }
     /**
     * @Route("/artistes", name="front_artistes")
     */
    public function frontArtistes(ArtisteRepository $artisteRepository, PaginatorInterface $paginator, Request $request)
    {
        $artistes = $artisteRepository->findAll();

        $pagination = $paginator->paginate(
            $artistes,
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('front/artistes.html.twig',[
            'pagination' => $pagination
        ]);
    }
}
