<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * Welcome Page
     *
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('pages/welcome.html.twig');
    }
    /**
     * About Page
     *
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('pages/about.html.twig');
    }

}
