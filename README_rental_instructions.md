
# Adições para Locação de Veículos

Foram adicionados os modelos, migrations, controllers, views e rotas básicos para um sistema de locação:
- Models: Vehicle, Customer, Rental
- Migrations: create_vehicles_table, create_customers_table, create_rentals_table
- Controllers: VehicleController, RentalController
- Views: resources/views/vehicles/* e resources/views/rentals/*
- Rotas: resource vehicles + rentals (index, create, store, show) e finalizar locação

**Instruções rápidas para usar:**
1. Copie este projeto para seu ambiente de desenvolvimento.
2. Configure `.env` com o banco de dados.
3. Rode `composer install` (se necessário) e `npm install` (para assets).
4. Rode `php artisan migrate` para criar as tabelas.
5. Opcional: crie clientes manualmente via tinker ou criando views/CRUD.
6. Acesse `/` para ver a lista de veículos.

Observação: o sistema adiciona um cliente manualmente necessário antes de criar uma locação.
