<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;

class BookApiJsonTest extends TestCase
{
    public function testJsonResponse()
    {
        // Simuler la réponse JSON de ton endpoint /books
        $json = '[{"title":"1984","author":"George Orwell"},{"title":"Brave New World","author":"Aldous Huxley"}]';
        $data = json_decode($json, true);

        $this->assertIsArray($data);
        $this->assertCount(2, $data);
        $this->assertEquals('1984', $data[0]['title']);
        $this->assertEquals('Aldous Huxley', $data[1]['author']);
    }
}
