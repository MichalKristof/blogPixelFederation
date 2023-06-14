<?php

namespace App\Tests\AppBundle\Entity;

use App\Entity\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testCreateAuthor()
    {
        $author = new Author();

        $author->setEmail('test@example.com');

        $this->assertEquals('test@example.com', $author->getEmail());
    }
}