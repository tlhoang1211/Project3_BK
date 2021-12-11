
![Logo](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/logo-3.png?raw=true)

# Web application for a fragrance store

This is an open-source web application designed to allow users to buy perfumes/fragrance from multiple brands online.  
It was created to serve as subject Project 3 of HUST.

## Tech Stack

- Laravel: 8
-  NodeJS
- Developed under [WampServer](https://www.wampserver.com/en/) stack:
  - Apache: 2.4.51
  - PHP: 8.0.13
  - MySQL: 8.0.27 / MariaDB: 10.6.5
  - Window OS enviroment
- Redis



## Screenshots

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_1.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_2.png?raw=true)

![App Screenshot](https://github.com/tlhoang1211/Project3_BK/blob/develop/public/assets/img/screenshots/img_3.png?raw=true)


## Installation

The application supports authentication with Google and Facebook via [Laravel Socialite](https://laravel.com/docs/8.x/socialite), which requires the website to have an SSL certificate (runs on HTTPS, not HTTP).

To make this possible on the Windows OS, you can use [WampServer SSL Auto Config](https://github.com/custom-dev-tools/WampServer-SSL-Auto-Config).

Next, you can follow this [video](https://youtu.be/jIckLu1cKew?t=921) to set up Laravel Socialite with your own API key and secret.
After generating your own key and secret, place them in.env. Like this:

```bash
  GOOGLE_CLIENT_ID="xxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com"
  GOOGLE_CLIENT_SECRET="xxxxxxxxxxxxxxxxxxxxxxxxxxx"
  GOOGLE_URL_CALLBACK="https://wanderlust.test.com/login/google/callback"

  FACEBOOK_CLIENT_ID="xxxxxxxxxxxxxxxxx"
  FACEBOOK_CLIENT_SECRET="xxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
  FACEBOOK_URL_CALLBACK="https://wanderlust.test.com/login/facebook/callback"
```
## Run Locally

Clone the project

```bash
  git clone clone https://github.com/tlhoang1211/Project3_BK.git perfume-web-app
```

Go to the project directory

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

Set up the databse

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
 
 or you can set up a custom domain name (virtual host) for Apache server.  
 Here's a [tutorial](https://www.youtube.com/watch?v=PoBvZZmt9Hs) if your are using WampServer.
## Features

- Basic e-commerce website functions:
  - View all products (with)
  - View product detail
  - Rate, comment
  - Add a product to cart
  - Place an order (create new receipt)
  - Login, register (using email or OAuth)

- Caching: using Redis
  


## Authors

- [@nvhoang55](https://github.com/nvhoang55)
- [@tlhoang1211](https://github.com/tlhoang1211)

## License

[MIT](https://choosealicense.com/licenses/mit/)

