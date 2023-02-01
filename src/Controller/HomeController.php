<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SheetService;

#[Route('/', name: 'home')]
class HomeController extends AbstractController
{
    private SheetService $sheetService;

    public function __construct(SheetService $sheetService)
    {
        $this->sheetService = $sheetService;
    }
    
    #[Route('/', name: '_index')]
    public function index(): Response
    {
        $sheets = $this->sheetService->findAll();

        return $this->render('home/index.html.twig', [
            'sheets' => $sheets
        ]);
    }
}
