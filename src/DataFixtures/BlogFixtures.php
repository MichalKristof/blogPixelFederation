<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $blog = new Blog();

            $blog->setTitle('Blog ' . $i);
            $blog->setDescription('Description ' . $i);
            $blog->setContent('Content ' . $i);
            $blog->setDate(new \DateTime());

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
