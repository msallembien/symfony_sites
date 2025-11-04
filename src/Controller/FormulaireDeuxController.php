<?php

namespace App\Controller;
use App\Form\DeuxiemeTestType;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
 
final class FormulaireDeuxController extends AbstractController
{
    #[Route('/formulaire/deux', name: 'app_formulaire_deux')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $book = New Book();
        $form = $this->createForm(DeuxiemeTestType::class,$book);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() &&  $form->isValid()) {
                $em->persist($book);
                $em->flush();
        }
        if ($form->isSubmitted() && !$form->isValid()) {
            $errors = $form->getErrors(true);

            foreach ($errors as $error) {
                $this->addFlash('error', $error->getMessage());
            }
        }
        return $this->render('/formulaire_deux/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
