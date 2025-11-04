<?php

namespace App\Controller;

use App\Form\TestformType;
use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeuxiemeController extends AbstractController
{
    #[Route('/deuxieme', name: 'app_deuxieme')]
    public function index(Request $request): Response
    {
        $book = New Book();
        
        $form = $this->createForm(TestformType::class,$book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }
        return $this->render('deuxieme/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
