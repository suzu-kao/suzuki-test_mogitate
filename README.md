# アプリケーション名
　もぎたて

## 環境構築
### Dockerビルド

1.クローンする

  - git clone git@github.com:suzu-kao/suzuki-test_mogitate.git

  - cd suzuki-test_mogitate
    
2.Dockerビルド

  - docker-compose up -d --build


### Laravel環境構築
1.phpコンテナ

  - docker-compose exec php bash

2.Laravel のパッケージのインストール

  - composer install

3.laravelの初期設定

 - cp .env.example .env

cp .env.example .env を実行後、以下のようにDB設定を変更してください。

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass 

4.アプリキー作成

  - php artisan key:generate

５.migration

  - php artisan migrate

６.seeding

  - php artisan db:seed


## 開発環境

  - 商品一覧：http://localhost/
    
  - お問い合わせ送信後画面：http://localhost/
    
  - 商品登録: http://localhost/

  - ログイン画面：http://localhost/

  - 管理画面：http://localhost/
    
  - phpMyAdmin：http://localhost:8080/


## 使用技術(実行環境)
- PHP 8.2.11
- Laravel 8.83.27
- MySQL 8.0.26
- nginx 1.21.1

## ER図

