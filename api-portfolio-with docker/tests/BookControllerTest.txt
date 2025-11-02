<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testGetBooks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/books');
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
    }

    
    public function testCreateBook(): void
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/books',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode(['title' => 'Test Driven Development', 'author' => 'Kent Beck'])
        );
        $this->assertResponseStatusCodeSame(201);
    }
}
