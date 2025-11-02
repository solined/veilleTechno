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
