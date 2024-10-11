<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController {
  #[Route('/')]
  //Funzione che reindirizza il contenuto della homepage
  public function homepage() : Response {
    return new Response('Title: Ajeje Brazorf');
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