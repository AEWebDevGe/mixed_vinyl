<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController {
  #[Route('/')]
  //Funzione che reindirizza il contenuto della homepage
  public function homepage() : Response {
    $tracks = [
        ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
        ['song' => 'Waterfalls', 'artist' => 'TLC'],
        ['song' => 'Creep', 'artist' => 'Radiohead'],
        ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
        ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
        ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ['song' => 'Paradise City', 'artist' => 'Guns N Roses'],
    ];
    return $this->render('vinyl/homepage.html.twig', [
        'title' => 'PB & James',
        'tracks' => $tracks,
    ]);
    //return new Response('Title: Ajeje Brazorf');
  }

  #[Route('/browse/{slug}')]
  public function browse(string $slug = null) : Response{
      if($slug) {
          $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title (true);
      }
      else {
          $title = 'All genres';
      }
      return new Response($title);
    //return new Response('Breakup vinyl? Browse the collection');
  }
}