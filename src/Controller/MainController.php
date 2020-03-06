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
    /**
     * Posts Page
     *
     * @Route("/posts/{slug?}", name="posts")
     * @param Request $request
     * @return void
     */
    public function posts(Request $request)
    {
        $post = $request->get('slug');

        return $this->render('pages/posts.html.twig', [
            'post' => $post
        ]);
    }
}
