# 📚 Book API (Symfony REST + Swagger + Tests + CI)

Une mini API REST construite avec Symfony, documentée via OpenAPI, testée avec PHPUnit et automatisée avec GitHub Actions.

## 🚀 Endpoints
- `GET /api/books` → liste tous les livres  
- `GET /api/books/{id}` → un livre spécifique  
- `POST /api/books` → créer un livre  

## 🧪 Tests
Les tests sont automatisés avec PHPUnit.  
CI/CD via GitHub Actions : état automatique des tests GitHub Actions (✅ ou ❌)
![Tests with Docker](https://github.com/solined/veilleTechno/actions/workflows/tests-api-portfolio-with-docker.yml/badge.svg)



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


## 🧠 Actions avec docker desktop
Docker contient : PHP 8.3, Composer, PHPUnit, ton code et tests.
Composer a installé toutes les dépendances dans /vendor.
Les tests passent (au moins la partie qui ne dépend pas d’un serveur HTTP réel).
mettre à jour ton repo GitHub : le CI/CD déclenchera les tests automatiquement via GitHub Actions.


Récap Docker
Pour ton workflow avec Docker :
- Construire l’image (une seule fois ou après modification du Dockerfile) :
	docker-compose build
- Ouvrir un conteneur interactif :
	winpty docker-compose run php bash

- Là tu es dans /var/www/html et tu peux lancer :
	composer install
		Ça installera les bundles Symfony, PHPUnit, etc. dans /var/www/html/vendor (ton projet).
	./vendor/bin/phpunit
		PHPUnit lira ton phpunit.xml et exécutera tes tests
	php integration.php
		
- Quand tu as fini, tape exit pour quitter le conteneur.
