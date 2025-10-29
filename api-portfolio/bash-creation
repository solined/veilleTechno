# 📁 1. Créer le dossier du projet
mkdir -p api-portfolio/{src/Controller/Api,tests,.github/workflows}
cd api-portfolio

# 🧱 2. Créer BookController.php
cat > src/Controller/Api/BookController.php <<'EOF'
<?php
namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController
{
    private array $books = [
        ['id' => 1, 'title' => 'Clean Code', 'author' => 'Robert C. Martin'],
        ['id' => 2, 'title' => 'Domain-Driven Design', 'author' => 'Eric Evans'],
    ];

    #[Route('/api/books', name: 'get_books', methods: ['GET'])]
    public function getBooks(): JsonResponse
    {
        return new JsonResponse($this->books);
    }

    #[Route('/api/books/{id}', name: 'get_book', methods: ['GET'])]
    public function getBook(int $id): JsonResponse
    {
        $book = array_filter($this->books, fn($b) => $b['id'] === $id);
        return $book
            ? new JsonResponse(array_values($book)[0])
            : new JsonResponse(['error' => 'Book not found'], 404);
    }

    #[Route('/api/books', name: 'create_book', methods: ['POST'])]
    public function createBook(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $newBook = [
            'id' => count($this->books) + 1,
            'title' => $data['title'] ?? 'Untitled',
            'author' => $data['author'] ?? 'Unknown',
        ];
        $this->books[] = $newBook;
        return new JsonResponse($newBook, 201);
    }
}
EOF

# 🧪 3. Test automatisé
cat > tests/BookControllerTest.php <<'EOF'
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
EOF

# 📘 4. Swagger / OpenAPI doc
cat > openapi.yaml <<'EOF'
openapi: 3.0.0
info:
  title: Book API
  version: 1.0.0
  description: Simple Book API for portfolio demonstration

paths:
  /api/books:
    get:
      summary: Get all books
      responses:
        '200':
          description: List of books
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Book'
    post:
      summary: Create a new book
      requestBody:
        required: true
        content:
          application/json:
            schema:
              $ref: '#/components/schemas/BookInput'
      responses:
        '201':
          description: Book created
  /api/books/{id}:
    get:
      summary: Get a book by ID
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      responses:
        '200':
          description: A single book
        '404':
          description: Book not found

components:
  schemas:
    Book:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        author:
          type: string
    BookInput:
      type: object
      properties:
        title:
          type: string
        author:
          type: string
EOF

# 🔄 5. Integration REST + GraphQL
cat > integration.php <<'EOF'
<?php
// integration.php
// Exemple d'intégration REST + GraphQL

function getBooks(): array {
    $response = file_get_contents('https://mon-api.test/api/books');
    return json_decode($response, true);
}

function getSpaceXLaunches(): array {
    $query = '{ launchesPast(limit: 3) { mission_name launch_date_utc } }';
    $opts = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json",
            'content' => json_encode(['query' => $query])
        ]
    ];
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://api.spacex.land/graphql/', false, $context);
    return json_decode($response, true)['data']['launchesPast'];
}

$books = getBooks();
$launches = getSpaceXLaunches();

echo json_encode([
    'books' => $books,
    'latest_launches' => $launches
], JSON_PRETTY_PRINT);
EOF

# ⚙️ 6. Workflow GitHub Actions
cat > .github/workflows/tests.yml <<'EOF'
name: Symfony API Tests
on:
  push:
    branches: [ "main" ]
  pull_request:
    branches: [ "main" ]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'
      - name: Install dependencies
        run: composer install
      - name: Run PHPUnit tests
        run: php bin/phpunit
EOF

# 🧾 7. README
cat > README.md <<'EOF'
# 📚 Book API (Symfony REST + Swagger + Tests + CI)

Une mini API REST construite avec Symfony, documentée via OpenAPI, testée avec PHPUnit et automatisée avec GitHub Actions.

## 🚀 Endpoints
- `GET /api/books` → liste tous les livres  
- `GET /api/books/{id}` → un livre spécifique  
- `POST /api/books` → créer un livre  

## 🧪 Tests
Les tests sont automatisés avec PHPUnit.  
CI/CD via GitHub Actions :  
![Tests](https://github.com/tonpseudo/api-portfolio/actions/workflows/tests.yml/badge.svg)

## 📘 Documentation
Swagger : `openapi.yaml`

## 🔄 Exemple d’intégration REST/GraphQL
Voir `integration.php` → combine Book API (REST) et SpaceX (GraphQL).

## 🧠 Stack
- PHP 8.3 / Symfony 6
- JSON / XML
- Swagger (OpenAPI 3)
- PHPUnit
- GitHub Actions CI/CD
EOF

echo "✅ Projet 'api-portfolio' créé avec succès !"
