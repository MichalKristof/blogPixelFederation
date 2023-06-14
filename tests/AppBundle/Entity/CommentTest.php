<?php

namespace App\Tests\AppBundle\Entity;

use App\Entity\Author;
use App\Entity\Blog;
use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function testComment()
    {
        // create date instance
        $date = new \DateTime();

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

        $blog->setDate($date);
        $this->assertEquals($date, $blog->getDate());

        $blog->setAuthor($author);
        $this->assertEquals($author, $blog->getAuthor());

        $comment = new Comment();
        $comment->setContent('Content');
        $this->assertEquals('Content', $comment->getContent());

        $comment->setDate($date);
        $this->assertEquals($date, $comment->getDate());

        $comment->setBlog($blog);
        $this->assertEquals($blog, $comment->getBlog());
    }
}