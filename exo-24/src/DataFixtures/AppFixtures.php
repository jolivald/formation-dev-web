<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use \DateTime;

use App\Entity\Post;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture

{

    public function load(ObjectManager $manager)
    
    {
    
        $d = new DateTime();
        
        for ($i = 0; $i < 20; $i++) {
        
            $post = new Post();
            $post->setTitle('Message n° '.$i);
            $post->setContent('Cet article a été codé avec amour par Jonathan.');
            $post->setCreatedAt($d);
            $manager->persist($post);
            
            $com = new Comment();
            $com->setPost($post);
            $com->setUsername('Yoloman');
            $com->setContent('Commentaire super constructif!');
            $com->setCreatedAt($d);
            $manager->persist($com);

        }


        $manager->flush();
    }
    
}