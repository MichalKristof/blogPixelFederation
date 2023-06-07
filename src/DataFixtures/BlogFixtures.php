<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Blog;
use App\Repository\AuthorRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $author = new Author();
            $author->setEmail('example' . $i . '@example.com');

            $manager->persist($author);

            $blog = new Blog();

            $blog->setTitle('Blog ' . $i);
            $blog->setAuthor($author);
            $blog->setDescription('Description ' . $i);
            $blog->setContent('Content ' . $i);
            $blog->setDate(new \DateTime());

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
