<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Post Controller
 *
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * List posts
     *
     * @Route("/", name="index")
     * @param PostRepository $postRepository
     * @return void
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }
    /**
     * Create Post
     *
     * @Route("/create", name="create")
     * @param Request $request
     * @return void
     */
    public function posts(Request $request)
    {
        // Create a new post
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Entity Manager
            $em = $this->getDoctrine()->getManager();

            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post was created successfully');

            return $this->redirectToRoute('post.index');
        }

        return $this->render('post/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * Show post
     *
     * @Route("/{id}", name="show")
     * @param Post $post
     * @return void
     */
    public function show(Post $post)
    {
        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);
    }
    /**
     * Delete post
     *
     * @Route("/delete/{id}", name="delete")
     * @param Post $post
     * @return void
     */
    public function destroy(Post $post)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was deleted!!');

        return $this->redirectToRoute('post.index');
    }
}
