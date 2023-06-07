![Logo](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/logo-3.png?raw=true)

# Fragrance Store Web Application

This open-source web application enables users to purchase perfumes and fragrances from a variety of brands online. It was developed as part of Project 3 at HUST.

## Technical Stack

- Laravel: 8
- NodeJS
- Developed using the [WampServer](https://www.wampserver.com/en/) stack:
  - Apache: 2.4.51
  - PHP: 8.0.13
  - MySQL: 8.0.27 / MariaDB: 10.6.5
  - Windows OS environment
- Redis

## Screenshots

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_1.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_2.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_3.png?raw=true)

## Installation

This application supports authentication via Google and Facebook using [Laravel Socialite](https://laravel.com/docs/8.x/socialite), which requires an SSL certificate for the website (running on HTTPS, not HTTP).

To enable this on Windows OS, you may use [WampServer SSL Auto Config](https://github.com/custom-dev-tools/WampServer-SSL-Auto-Config).

Next, follow this [video](https://youtu.be/jIckLu1cKew?t=921) to set up Laravel Socialite with your own API key and secret. After generating your own key and secret, place them in .env as shown below:

```bash
  GOOGLE_CLIENT_ID="xxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com"
  GOOGLE_CLIENT_SECRET="xxxxxxxxxxxxxxxxxxxxxxxxxxx"
  GOOGLE_URL_CALLBACK="https://wanderlust.test.com/login/google/callback"

  FACEBOOK_CLIENT_ID="xxxxxxxxxxxxxxxxx"
  FACEBOOK_CLIENT_SECRET="xxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
  FACEBOOK_URL_CALLBACK="https://wanderlust.test.com/login/facebook/callback"
```

## Running Locally

Clone the project

```bash
  git clone clone https://github.com/tlhoang1211/Project3_BK.git perfume-web-app
```

Navigate to the project directory

```bash
  cd perfume-web-app
```

Generate a .env file

```bash
  cp .env.example .env
```

Install dependencies

```bash
  composer install
```
```bash
  npm install
```

Set up the database

```bash
  php artisan migrate
```
```bash
  php artisan db:seed
```

Start the server

```bash
  php artisan serve
```

Alternatively, you can set up a custom domain name (virtual host) for the Apache server. Here is a [tutorial](https://www.youtube.com/watch?v=PoBvZZmt9Hs) if you are using WampServer.

## Features

- Basic e-commerce website functionality:
  - View all products (with filters)
  - View product details
  - Rate and comment on products
  - Add products to cart
  - Place an order (create a new receipt)
  - Login and register (using email or OAuth)

- Caching: using Redis

## Authors

- [@nvhoang55](https://github.com/nvhoang55)
- [@tlhoang1211](https://github.com/tlhoang1211)

## License

[MIT](https://choosealicense.com/licenses/mit/)
