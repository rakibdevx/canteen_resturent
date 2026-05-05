# Laravel Canteen/Restaurant Project

## Project Overview
This is a Laravel-based Canteen/Restaurant Management System that allows users to browse menus, place orders, and manage payments online.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Features](#features-list)
3. [Setup Instructions](#setup-instructions)

    ```
    Clone the Git Repository
    Install Composer Dependencies
    Create Database
    Environment Setup
    Run Migrations and Seeders
    Start the Development Server
    ```

## Prerequisites

Before you begin, ensure you have the following installed on your system:

1. **PHP** (minimum version 8.2)
2. **Composer** (Dependency Manager for PHP)
3. **MySQL** (or any other database supported by Laravel)
4. **XAMPP/WAMP/LAMP** (for running a local server)


# Features List
    User authentication (login/register)
    Food ordering system
    Cart system
    Payment integration (Stripe)
    Admin dashboard
    Order Tracking


## Live Demo
    https://www.res.ayanshop.com/

## Setup Instructions

Follow the steps below to set up the project on your local machine.

### 1. Clone the Git Repository

First, clone the project repository to your local machine.

bash:<pre> git clone https://github.com/rakibdevx/canteen_restaurant.git </pre>

### 2. Install Composer Dependencies

Next, navigate to the project directory and install the required PHP packages using Composer.

bash <pre> cd canteen_restaurant</pre>
<pre>composer install  </pre>


### 3. Create Database
Step-by-Step Guide to Create a Database via phpMyAdmin:

    Start XAMPP or WAMP:

        launch the local web server and database server on your machine.

        Open phpMyAdmin:
            Once the services are running, open your browser and go to http://localhost/phpmyadmin
            .This will open the phpMyAdmin interface.

            Login to phpMyAdmin:
                By default, you may not need a username or password if it's set to default. However, if you have set a password for MySQL, use the credentials to log in.

            Create a New Database:
                On the phpMyAdmin home page, look at the left sidebar and click on Databases.

                In the "Create database" section, you'll see a field for entering the database name.

                Enter a name for your database (e.g., canteen_restaurant). Make sure the name follows the naming conventions (no spaces, no special characters except underscores).

                Under the Collation dropdown, leave the default option (utf8_general_ci) unless you have specific reasons to choose a different one.

            Click on the Create button.

        Verify Database Creation:
            After clicking the Create button, your new database should now appear in the list on the left sidebar.

Make sure to replace `canteen_restaurant` with any name you prefer.

### 4. Environment Setup

Next, copy the `.env.example` file to create your `.env` file:

bash <pre> cp .env.example .env  </pre>
If you get any error while copying `.env.example to .env`, you can use **manual copy** instead.
 <pre> php artisan key:generate  </pre>

Edit the `.env` file with your database credentials.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=canteen_restaurant   # Use the database name you created above
DB_USERNAME=root                 # Your MySQL username
DB_PASSWORD=yourpassword         # leave blank if no password
```

Make sure that the environment variables match your local setup.

### 5. Run Migrations and Seeders

Now, you need to run the database migrations and seeders to set up your tables and initial data.

Run the migrations:

bash
<pre>php artisan migrate</pre>


Optionally, you can also run the seeders if you want to populate the database with sample data:

bash <pre>php artisan db:seed</pre>

### 6. Start the Development Server

Finally, you can start the Laravel development server:

bash
<pre>php artisan serve</pre>

By default, it will run on `http://localhost:8000`.



📌 Additional Information
💳 Test Cards (Stripe Sandbox)

You can use the following test cards for online payment testing:

| Brand                 | Number              | CVC          | Expiry          |
| --------------------- | ------------------- | ------------ | --------------- |
| Visa                  | 4242 4242 4242 4242 | Any 3 digits | Any future date |
| Visa (debit)          | 4000 0566 5566 5556 | Any 3 digits | Any future date |
| Mastercard            | 5555 5555 5555 4444 | Any 3 digits | Any future date |
| Mastercard (2-series) | 2223 0031 2200 3222 | Any 3 digits | Any future date |
| Mastercard (debit)    | 5200 8282 8282 8210 | Any 3 digits | Any future date |
| Mastercard (prepaid)  | 5105 1051 0510 5100 | Any 3 digits | Any future date |
| American Express      | 3782 822463 10005   | Any 4 digits | Any future date |
| American Express      | 3714 496353 98431   | Any 4 digits | Any future date |


* If you want to run the project on a custom server (like XAMPP/WAMP), make sure to move the project folder inside the `htdocs` directory (for XAMPP) or equivalent.

* You can also use `php artisan serve` to run the application using Laravel's built-in server, but this is typically for development purposes.

---

Feel free to ask if you have any questions or face any issues while setting up the project!

Contact : rakib042002@gmail.com

---
