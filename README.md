# Leave Application Website (Laravel) is a full-stack application for managing and applying leave on an organization.

## Installation

### clone this project into your machine

```bash
git clone https://github.com/ronald-kimeli/leave-management-system.git
```

### Install project dependencies

* PHP packages

```php
composer install
```

* Node packages

```javascript
npm install
```

### Create .env file through copy

```bash
cp .env.example .env
```
 
### Provide database credentials below in .env file.

```bash
DB_DATABASE=?Your_DB_Database
DB_USERNAME=?Your_DB_Username
DB_PASSWORD=?Your_DB_password
```

### Run migrations and seed dummy data

```php
php artisan migrate:fresh --seed 
```

### Generate key for laravel new application you have installed and clear cache.

```php
php artisan key:generate && php artisan config:cache
```

## Start the application

```php
php artisan serve
```

## Navigate to your browser link 

```php 
localhost:8000
```

### Testing !email and password respectifully

* First we need to login as user, try apply leave, check leave status and logout

## User leads you to homepage

```bash
user@gmail.com = 12345678
```

## Admin leads you to admin dashboard

```bash
admin@gmail.com = 12345678
```

## Great! we can now review the work of this software, Note! that API is also included

#### On the Front_End
* Apply Leave
* View status of your application
* Logout out of the system
  * You can as well use api to register,login,logout and pull the data using Postman

#### On the Back_End
* Manage Users, Departments, Applied Leaves, and Leave Types
* Logout out of the system



