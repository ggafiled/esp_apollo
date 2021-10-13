# ESP_APOLLO (เว็บแอพพลิเคชันสำหรับอัพเดตซอร์ดโค้ดบนอุปกรณ์ระบบฝังตัว หรือ สมองกลฝังตัว)

## Tech Specification

-   Laravel 8
-   Vue 2 + VueRouter + vue-progressbar + sweetalert2 + laravel-vue-pagination
-   Schedular Service
-   Laravel Passport
-   Laravel laravolt/avatar
-   Laravel mpociot/teamwork
-   Laravel spatie/laravel-activitylog
-   Laravel santigarcor/laratrust
-   Laravel tohidplus/laravel-vue-translation
-   ThailandAutoComplete
-   Admin LTE 3 + Bootstrap 4 + Font Awesome 5
-   PHPUnit Test Case/Test Coverage

## Features

-   Modal based Create+Edit, List with Pagination, Delete with Sweetalert
-   Login, Register, Forget+Reset Password as default auth
-   Profile, Update Profile, Change Password
-   User Management
-   Database Backup Schedular & Log activity
-   Frontend and Backend User ACL with Gate Policy (type: admin/user)
-   Simple Static Dashboard
-   Developer Options for OAuth Clients and Personal Access Token
-   Build with Docker

## API 
- http://localhost:8000/<PROVIDER_KEY>/currentVersion สำหรับให้อุปกรณ์ตรวจสอบเวอร์ชันการใช้งานล่าสุด
- http://localhost:8000/provider/<PROVIDER_KEY>/dowloadCode ลิงค์ URL for Streaming dowload ไฟล์ซอร์ดโค้ด

![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/dashboard.png)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/dashboard01.PNG)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/dashboard02.PNG)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/dashboard03.PNG)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/dashboard04.PNG)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/console.png)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/role.png)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/user.png)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/users.png)
![Preview](https://raw.githubusercontent.com/ggafiled/esp_apollo/main/public/images/waite.png)

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
