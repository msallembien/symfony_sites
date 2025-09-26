<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeuxiemeController extends AbstractController
{
    #[Route('/deuxieme', name: 'app_deuxieme')]
    public function index(): Response
    {
        return $this->render('deuxieme/index.html.twig', [
            'controller_name' => 'DeuxiemeController',
        ]);
    }
}
