<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageControlerController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('page_controler/index.html.twig', [
            'controller_name' => 'PageControlerController',
        ]);
    }
    
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('page_controler/about.html.twig', [
            'controller_name' => 'PageControlerController',
        ]);
    }
}
