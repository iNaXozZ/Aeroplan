<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetardController extends AbstractController
{
    /**
     * @Route("/retard", name="retard")
     */
    public function index(): Response
    {
        return $this->render('retard/index.html.twig', [
            'controller_name' => 'RetardController',
        ]);
    }
}
