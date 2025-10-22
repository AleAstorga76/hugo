<?php
// src/Controller/MenuController.php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'menu')]
    public function index(ProductRepository $productRepository): Response
    {
        $rolls = $productRepository->findByCategory('roll');
        $combos = $productRepository->findByCategory('combo');

        return $this->render('menu/index.html.twig', [
            'rolls' => $rolls,
            'combos' => $combos,
        ]);
    }
}