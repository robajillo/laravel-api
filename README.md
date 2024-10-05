 # Laravel Backend Setup for API Development

## Overview
This section outlines the steps to set up a Laravel API that provides JWT-based authentication and endpoints for managing customers and products.

## Prerequisites
- Ensure you have PHP and Composer installed on your system.
- Set up a MySQL database and note down the database credentials.

## Step-by-Step Guide

### 1. Create a New Laravel Project
Run the following command in your terminal to create a new Laravel project:

```bash
composer create-project --prefer-dist laravel/laravel your-project-name

```
### Configure DataBase Connection
- Open the .env file located in the root of your Laravel project and update the following lines with your MySQL database - credentials:

```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
### Create Database Migrations
- Run the following commands to create the necessary migrations for the users, products, and customers tables:

```bash

php artisan make:migration create_users_table --create=users
php artisan make:migration create_products_table --create=products
php artisan make:migration create_customers_table --create=customers
```

### Define Migration Structure
- Edit the migration files located in the database/migrations directory and define the necessary fields for each table:

- Users Table Migration:

```bash
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});
```
- Products Table Migration:

```bash
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price', 8, 2);
    $table->timestamps();
});
```
- Customers Table Migration:
```bash
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone_number');
    $table->timestamps();
});
```
### Run Migrations
- Execute the migrations to create the tables in your MySQL database:

```bash
php artisan migrate
```
### Install JWT Authentication Package
- Install the tymon/jwt-auth package for JWT authentication:

```bash
composer require tymon/jwt-auth
```
- After installation, publish the package configuration:

```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\JWTServiceProvider"
```
- Then generate the JWT secret key:

```bash
php artisan jwt:secret
```

### Implement Authentication Logic
- Create a controller for authentication:

```bash

php artisan make:controller AuthController
```
- In the AuthController, implement the login method:

```bash
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'invalid_credentials'], 401);
    }
    return response()->json(compact('token'));
}
```

### Define API Routes
- Open the routes/api.php file and define the necessary routes:

```bash
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index']);
});
Route::get('/products', [ProductController::class, 'index']);
```

### Create Controllers for Products and Customers
- Generate controllers for handling products and customers:

```bash

php artisan make:controller ProductController
php artisan make:controller CustomerController
```
- In each controller, implement the index methods to return data from the database.

### Test Your API
- You can use tools like Postman or Insomnia to test your API endpoints:
```bash
Login: POST /api/login with email and password to receive a JWT.
Products: GET /api/products to retrieve the list of products.
Customers: GET /api/customers to retrieve the list of customers (requires JWT in headers).
```
### Conclusion
- This guide provides a concise overview of the steps required to set up a Laravel backend with JWT authentication and  necessary API endpoints. Ensure that your application follows best practices for security and code quality throughout -development.

 



