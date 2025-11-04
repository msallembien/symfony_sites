<?php

namespace App\Controller;
use App\Entity\Book;
use App\Entity\Authors;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PremierController extends AbstractController
{
    #[Route('/premier', name: 'app_premier')]
    public function index(): Response
    {
        return $this->render('premier/index.html.twig', [
            'controller_name' => 'PremierController',
        ]);
    }
    #[Route('/testdb', name: 'app_testdb')]
    public function addtitle(EntityManagerInterface $em): Response
    {
       $book = new Book();
       $book->setTitle('bien Essayer');

       $em->persist($book);
       $em->flush();

       $Autheur = new Authors();
       $Autheur->setName('Mervyn Sallembien');

       $em->persist($Autheur);
       $em->flush();
       return new Response("Mervyn Sallembien" .$Autheur->getName());
   }

}
