<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post_index", methods = {"GET"})
     * @param PostRepository $postRepository
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        return $this->json($posts, 200, [], ['groups' => 'post:read']);
    }

    /**
     * @Route("/api/post", name="api_post_insert", methods = {"POST"})
     */
    public function insert(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ) {
        try {
            $json = $request->getContent();
            $post = $serializer->deserialize($json, Post::class, 'json');
            $post->setCreatedAt(new \DateTime());
            $errors = $validator->validate($post);
            if (!empty($errors)){
                return $this->json($errors, 400);
            }
            $em->persist($post);
            $em->flush();
            return $this->json($post, 201, [], ['groups' => 'post:read']);
        }
        catch (NotEncodableValueException $err) {
            $data = [ 'status' => 400, 'message' => $err->getMessage() ];
            return $this->json($data, 400, [], ['groups' => 'post:read']);
        }
    }
}
