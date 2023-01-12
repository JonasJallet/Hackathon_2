<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectivityController extends AbstractController
{
    #[Route('/collectivity', name: 'app_collectivity')]
    public function index(): Response
    {
        return $this->render('collectivity/index.html.twig', []);
    }
}
