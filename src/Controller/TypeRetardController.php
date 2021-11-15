<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeRetardController extends AbstractController
{
    /**
     * @Route("/type/retard", name="type_retard")
     */
    public function index(): Response
    {
        return $this->render('type_retard/index.html.twig', [
            'controller_name' => 'TypeRetardController',
        ]);
    }
}
