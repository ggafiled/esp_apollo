# vue-laravel-starter
## Tech Specification
- Laravel 8
- Vue 2 + VueRouter + vue-progressbar + sweetalert2 + laravel-vue-pagination
- Schedular Service
- Laravel Passport
- Laravel mpociot/teamwork
- Laravel spatie/laravel-activitylog
- Laravel santigarcor/laratrust
- Laravel tohidplus/laravel-vue-translation
- ThailandAutoComplete
- Admin LTE 3 + Bootstrap 4 + Font Awesome 5
- PHPUnit Test Case/Test Coverage

## Features
- Modal based Create+Edit, List with Pagination, Delete with Sweetalert
- Login, Register, Forget+Reset Password as default auth
- Profile, Update Profile, Change Password
- User Management
- Database Backup Schedular & Log activity
- Frontend and Backend User ACL with Gate Policy (type: admin/user)
- Simple Static Dashboard
- Developer Options for OAuth Clients and Personal Access Token
- Build with Docker

## Installation

-   `git clone https://github.com/AnowarCST/vue-laravel-starter.git`
-   `cd vue-laravel-starter/`
-   `composer install --ignore-platform-reqs`
-   `cp .env.example .env`
-   Update `.env` and set your database credentials
-   `php artisan key:generate`
-   `php artisan migrate`
-   `php artisan db:seed`
-   `php artisan passport:install`
-   `npm install`
-   `npm run dev`
-   `php artisan serve`

## Install with Docker

-   `docker-compose up -d`
-   `docker exec -it vue-starter /bin/bash`
-   `composer install --ignore-platform-reqs`
-   `cp .env.example .env`
-   `php artisan key:generate`
-   `php artisan migrate`
-   `php artisan db:seed`
-   `php artisan passport:install`
-   Application http://localhost:8008/
-   Adminer for Database http://localhost:8080/
-   DBhost: yourIP:3307, user: root, Password: 123456

## Unit Test

#### run PHPUnit

```bash
# run PHPUnit all test cases
vendor/bin/phpunit
# or Feature test only
vendor/bin/phpunit --testsuite Feature
```

#### Code Coverage Report

```bash
# reports is a directory name
vendor/bin/phpunit --coverage-html reports/
```

A `reports` directory has been created for code coverage report. Open the dashboard.html.

## License

[MIT license](https://opensource.org/licenses/MIT).
