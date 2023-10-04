<?php

namespace App\Controller;

use App\Entity\MyBooks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class MyBooksController extends AbstractController
{
   
    public function index(): Response
    {
        return $this->render('my_books/index.html.twig', [
            'controller_name' => 'MyBooksController',
        ]);
    }
   
    #[Route('/my/books', name: 'app_my_books', methods: ['GET'])]
    public function indexAction()
    {
        $htmlpage = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome!</title>
    </head>
    <body>
        <h1>Welcome</h1>
            
    <p>Bienvenue dans la liste des inventaires</p>
    </body>
</html>';
        
        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
            );
    }
    #[Route('my/books/list', name: 'Inventory_list', methods: ['GET'])]
    public function listAction(ManagerRegistry $doctrine)
    {
        $htmlpage = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Inventory List !!</title>
    </head>
    <body>
        <h1>todos list</h1>
        <p>Here are all the inventories:</p>
        <ul>';
        
        $entityManager= $doctrine->getManager();
        $mybooks = $entityManager->getRepository(MyBooks::class)->findAll();
        foreach($mybooks as $mybooks) {
            $inventoryId = $mybooks->getId(); 
            $inventoryName = $mybooks->getNameINV(); 
            
            $inventoryLink = $this->generateUrl('MyBooks_show', ['id' => $inventoryId]);
            $htmlpage .= '<li>
            <a href="' .$inventoryLink. '">'. $inventoryName . '(' . $inventoryId . ')</a></li>';
         }
        $htmlpage .= '</ul>';

        $htmlpage .= '</body></html>';
        
        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
            );
    }
    /**
 * Show a [inventaire]
 *
 * @param integer $id 
 */




#[Route('/{id}', name: 'MyBooks_show', requirements: ['id' => '\d+'])]
public function showAction(MyBooks $mybooks): Response
  
{
    $htmlpage = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The inventory n° '.$mybooks->getId().' details</title>
</head>
<body>
    <h2>Inventory details:</h2>
    <ul>
    <dl>';
    
    $htmlpage .= '<dt>Existing BOOKS</dt><dd>' . $mybooks->booksToString() . '</dd>';
    return new Response('<html><body>'. $htmlpage . '</body></html>');
   
}

    
    
   
}
