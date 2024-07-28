### Author : MBK Bhandari ( https://www.linkedin.com/in/mbk-9852/ )

# Product Orders APIs

**Product Orders APIs** is a Laravel-based backend service for managing product orders. This project uses a multi-layer architecture with repositories, interfaces, and traits to create a clean and maintainable codebase. It includes APIs for creating and retrieving orders, ensuring robust and efficient handling of product orders.

## Features

- **Create Order:** Allows users to create new orders using structured API requests.
- **Retrieve Order:** Provides detailed information about orders, including order items and status.
- **Multi-layer Architecture:** Implements repository pattern with interfaces and traits for clean and maintainable code.
- **Error Handling:** Comprehensive error handling to ensure smooth operation and clear error messages.

## Installation

To get a local copy up and running, follow these simple steps:

1. **Clone the repository:**

   ```bash
   git clone git@github.com:bh-1996/Product-Orders-APIs.git

2. Navigate to the project directory:
    ```bash
    cd Product-Orders-APIs

3. Install dependencies:
    ```bash
    composer install


4. Copy .env.example to .env and configure your environment variables:
    ```bash
    cp .env.example .env

5. Generate application key:
    ```bash
    php artisan key:generate

6. Run database migrations:
    ```bash
   php artisan migrate

7. Seed the database:
    ```bash
    php artisan db:seed

8. Serve the application:
    ```bash
    php artisan serve


**Testing**
- To run tests, use the following command:
    ```bash
    php artisan test

## Contributing
- Feel free to open issues or submit pull requests. Any contributions are welcome!

