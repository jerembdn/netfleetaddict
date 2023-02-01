<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'home')]
class HomeController extends AbstractController
{
  #[Route('', name: '_index', methods: ['GET'])]
  public function index()
  {
    return $this->render('home/index.html.twig');
  }
}