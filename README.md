# Pigly - 体重管理アプリ

COACHTECH 確認テスト③ の提出物です。  
体重、摂取カロリー、運動時間などの記録を行い、一覧・検索・編集・削除ができるアプリケーションです。

---

## ■ 使用技術
- Laravel 10
- PHP 8.3
- MySQL
- Docker（Laravel Sail）
- HTML / CSS / Blade
- Composer

---

## ■ 機能一覧

### ● 認証
- ログイン / ログアウト（Fortify使用）

### ● 体重ログ（weight_logs）
- 一覧表示（ページネーションあり）
- 新規登録（モーダルウィンドウ）
- 検索（期間指定）
- 編集（体重・カロリー・運動時間・運動内容）
- 削除
- バリデーション表示（赤文字）

### ● 目標体重（weight_targets）
- 目標体重の登録
- 目標体重の変更
- 一覧画面上部に最新体重と比較表示

---

## ■ 画面一覧
- ログイン画面
- 体重一覧画面（検索 / 登録モーダルあり）
- 情報更新画面（編集ページ）
- 目標体重の設定画面

---

## ER図

![ER図](public/er.png)


---

## ■ 環境構築（Docker）

```bash
# 1. リポジトリをクローン
git clone

# 2. ディレクトリへ移動
cd pigly-final-copy

# 3. Docker 起動
docker compose up -d

# 4. コンテナへ入る
docker compose exec php bash

# 5. Composer インストール
composer install

# 6. env 作成
cp .env.example .env

# 7. アプリキー生成
php artisan key:generate

# 8. マイグレーション
php artisan migrate

# 9. 初期ユーザー作成（Seeder で test@example.com）
php artisan db:seed

ログイン用ユーザー
メール：test@example.com
パスワード：password
