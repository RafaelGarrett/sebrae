## Requisitos

    * PHP 8.2 ou superior
    * Composer
    * Node.js 24 ou superior

## Como rodar o projeto 

    ```
    docker compose up -d --build
    docker exec -it php-fpm bash
    php artisan migrate
    nvm install 20
    npm run dev
    ```

    Acessar o conteúdo padrão do Laravel
    ```
    http://localhost:8000/
    ```