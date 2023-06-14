<?php

namespace App\Tests\AppBundle\Entity;

use App\Entity\Author;
use App\Entity\Blog;
use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    public function testCreateBlog()
    {
        // first create Author type App/Entity/Author
        $author = new Author();
        $author->setEmail('test@test.com');

        $blog = new Blog();

        $blog->setTitle('Super blog');
        $this->assertEquals('Super blog', $blog->getTitle());

        $blog->setDescription('Nice description');
        $this->assertEquals('Nice description', $blog->getDescription());

        $blog->setContent('Test content');
        $this->assertEquals('Test content', $blog->getContent());

        $date = new \DateTime();
        $blog->setDate($date);
        $this->assertEquals($date, $blog->getDate());

        $blog->setAuthor($author);
        $this->assertEquals($author, $blog->getAuthor());
    }
}