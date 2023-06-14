<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BlogFixtures extends Fixture
{
    protected $faker;

    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('en_US');

        for ($i = 1; $i <= 20; $i++) {
            $author = new Author();
            $author->setEmail($this->faker->safeEmail());

            $manager->persist($author);

            $blog = new Blog();

            $blog->setTitle($this->faker->realText($maxNbChars = 10, $indexSize  = 1));
            $blog->setAuthor($author);
            $blog->setDescription($this->faker->realText($maxNbChars = 30, $indexSize = 2));
            $blog->setContent($this->faker->realText($maxNbChars = 200, $indexSize = 2));
            $blog->setDate($this->faker->dateTime());

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
