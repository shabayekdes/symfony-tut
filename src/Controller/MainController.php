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
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/MainController.php',
        // ]);
        return new Response('<h1>Welcome page</h1>');
    }
    /**
     * About Page
     *
     * @Route("/about", name="about")
     */
    public function about()
    {
        return new Response('<h1>About page</h1>');
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

        return new Response('<h1>Posts page - ' . $post .'</h1>');
    }
}
