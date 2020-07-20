<?php

namespace App\DataFixtures;

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
            
        }

        $manager->flush();
    }
    
}