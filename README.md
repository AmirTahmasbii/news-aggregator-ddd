Laravel Project: News Aggregator API

This project implements a News Aggregator API using Laravel. It follows best practices such as Domain-Driven Design (DDD) and Command Query Responsibility Segregation (CQRS) for clean, modular, and scalable architecture.

Features

Authentication:

User registration and login using Laravel Sanctum.

Token-based authentication for secure API access.

Article Management:

Fetch articles from multiple external news APIs.

Store and update articles locally in the database.

Filter articles by keyword, category, source, or publication date.

User Preferences:

Users can save preferences for news categories and sources.

Personalized news feed based on user preferences.

Scheduled Data Fetching:

Regularly fetch and update articles using Laravel Scheduled Commands.

Ensure all data filtering and searching occurs on local data.

Architecture Overview

This project follows Domain-Driven Design (DDD) principles and incorporates CQRS for better separation of concerns and scalability.

Domain-Driven Design (DDD)

DDD is a design approach that emphasizes:

Business-Oriented Models: Models reflect the core business logic.

Separation of Concerns: Code is organized into layers to isolate domain logic from infrastructure and presentation layers.

Layers in DDD:

Domain Layer:

Contains core business logic, entities, value objects, and domain events.

Free from dependencies on frameworks or external libraries.

Application Layer:

Contains use cases (commands, queries, and their handlers).

Coordinates between the domain and infrastructure layers.

Infrastructure Layer:

Handles database interactions, API clients, and external services.

Presentation Layer:

Exposes functionality via controllers and routes.

Command Query Responsibility Segregation (CQRS)

CQRS is a pattern that separates command operations (write) from query operations (read).

Benefits:

Scalability: Read and write operations can be scaled independently.

Clear Separation: Command logic (state-changing operations) is distinct from query logic (retrieving data).
