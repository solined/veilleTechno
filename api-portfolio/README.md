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
