<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post_index", methods = {"GET"})
     * @param PostRepository $postRepository
     * @return Response
     */
    public function index(PostRepository $postRepository, NormalizerInterface $normalizer)
    {
        $posts = $postRepository->findAll();
        
        $post_normalize = $normalizer->normalize($posts);
        //$json = json_encode($post_normalize);
        //echo $json;
        // return new JsonResponse($post_normalize);
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
            'posts' => $posts
        ]);
    }
}