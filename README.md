# Leave Application Website based on Laravel

## Installation

* clone this project into your machine
  ```
  git clone https://github.com/KimelirR/Leave-Application-Laravel.git
  ```

* Install project dependencies

  ```php
   composer install
  ```

  ```javascript
    npm install
  ```

* Create .env file through copy

  ```
    cp .env.example .env
  ```
 
* Provide database credentials below in .env file.

  ```
     DB_DATABASE=?Your_DB_Database
     DB_USERNAME=?Your_DB_Username
     DB_PASSWORD=?Your_DB_password
  ```

* Run migrations 
    ```php
    php artisan migrate:fresh --seed 
    ```

* Generate key for laravel new application you have installed.

```php
  php artisan key:generate && php artisan config:cache
```

## Start Our application

```php
  php artisan serve
```

## Navigate to your browser link 

```php 
localhost:8000
```

### Testing

* First we need to login as user, try apply leave, check leave status and logout

> User leads you to homepage
<p> Login with the credentials below</p>

Email

```bash
loyal@gmail.com
```

Password

```bash
12345678
```

**  Lastly we need to login as user, try apply leave, check leave status and logout

> Admin leads you to admin dashboard
<p> Login with the credentials below</p>

Email

```bash
doris@gmail.com
```

Password

```bash
12345678
```

## Now we are great

#### On the Front_End
          *Apply Leave
          *View status of your application
          *Logout out of the system
            *You can as well use api to register,login,logout and pull the data using Postman

#### On the Back_End
          *Manage Users, Departments,Applied Leaves, and Leave Types
          *Logout out of the system
           
#### On the Back_End
          *Database name is **leave_management** *


