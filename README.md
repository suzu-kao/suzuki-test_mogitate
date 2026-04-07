# アプリケーション名
　もぎたて

本アプリはスクール課題をベースに制作しましたが、自分で環境構築や実装を行いました。
特に以下の点を意識して取り組みました。
- Dockerを用いた開発環境構築
- LaravelでのCRUD処理の実装
- バリデーションやデータベース設計の理解

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

  - 商品一覧：http://localhost/products

  - 商品詳細：http://localhost/products/detail/{productId}
    
  - 商品登録: http://localhost/register
    
  - phpMyAdmin：http://localhost:8080/


## 使用技術(実行環境)
- PHP 8.2.11
- Laravel 8.83.27
- MySQL 8.0.26
- nginx 1.21.1

## ER図
<img width="751" height="771" alt="mogitate drawio" src="https://github.com/user-attachments/assets/779b13f7-f6b6-42e6-b6b2-ee1f58e166e8" />


