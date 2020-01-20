# Laravel開発環境テンプレート
## Dockerで構築するLaravel開発環境
### 構築される環境
```
LAMP + Laravel
L: Linux(alpine)
A: Apache2.4(alpine)
M: MySQL 5.7
P: PHP7.3

Laravel => バージョンは任意に対応
```
### ファイル構成
```
laravel_develop_env_docker/
  ┃
  ┣━━ app_server (PHP + Laravel + apache2 サーバー)
  ┃    ┣━ laravel (Laravelプロジェクトマウントディレクトリ)
  ┃    ┣━ laravel_setting(コンテナ構築シェルシェルスクリプト)
  ┃    ┃    ┣━ restart.sh (プロジェクトルートへのシンボリックリンク復旧用スクリプト)
  ┃    ┃    ┗━ setting.sh (Laravelプロジェクト生成スクリプト)
  ┃    ┣━　Dockerfile
  ┃    ┣━　httpd.conf
  ┃    ┗━　php7-module.conf
  ┃
  ┣━━ db_server（MySQLサーバー）
  ┃    ┣━ db_volume (dbコンテナデータ永続化ディレクトリ)
  ┃    ┣━　Dockerfile
  ┃    ┗━　mysql.conf
  ┃
  ┣━━ .env (Laravelプロジェクト名、バージョン設定)
  ┣━━ .gitignore
  ┣━━ app_create.sh (初回コンテナ生成用スクリプト)
  ┣━━ app_start.sh (コンテナ起動スクリプト)
  ┗━━ README.md
```
※app_server内のlaravelディレクトリと、db_server内のdb_volumeは初回コンテナ作成時に自動で生成されます。
<br><br>

## 使用方法
### Laravel新規作成時
**0.リポジトリをクローン**

**1.Laravelのプロジェクト名とバージョンの指定**

ルートディレクトリの.envファイルを修正
```
PROJECT_NAME=任意のアプリ名
LARAVEL_VERSION=5.7.*　# <= 任意のバージョン. 空白で最新バージョン
```
<br>

**2.プロジェクト作成**

a.ローカル:ルートディレクトリにある新規アプリ作成スクリプト(create_app.sh)を実行
```
# ./create_app.sh
```
<br>
b. コンテナ内:aの実行が終了するとwebサーバーコンテナにアタッチされるので、`/var/www`ディレクトリで`setting.sh`を実行

```
# pwd
/var/www
# ./setting.sh
```
`setting.sh`では、`/var/www/laravel`ディレクトリでのLaravelのインストールと、
`/var/www/laravel`ディレクトリとDocumentRootに設定されているディレクトリ`/var/www/app`間でのシンボリックリンクが作成される。
<br>

c. ローカル:setting.shが完了後は、ブラウザから`http://localhost`で接続可能。LaravelTOPページが表示される。

### 2回目以降の実行

**1.ローカル:ルートディレクトリにあるアプリ実行スクリプト(start.sh)を実行**
```
# ./start.sh
```
上記コマンドで、`docker-compose up`と、サーバー内でプロジェクトのディレクトリとDocumentRoot用ディレクトリ間でシンボリックリンクが再度設定され、ブラウザからの接続が可能になる。
<br>

### その他
**.gitignore**
- 初期は、Laravelプロジェクトマウントディレクトリを除外しているので、開発開始時点で.gitignoreの対象から外す。
- dbコンテナ生成時に、db_volumeディレクトリがすでに存在している場合、docker-composeのenvironmentの内容は反映されないので注意。ディレクトリを削除後にコンテナを作成すると反映される。

**LaravelでのDB接続設定について**

Laravelプロジェクトのルートディレクトリにある.envのDB_HOSTには、servisesでDBサーバーに設定している名前を指定。

↓docker-compose.yml
```
services:
  db: <= これを.envのDB_HOSTに指定
    container_name: db_server
```
↓Laravelのルートディレクトリの.envファイル内
```
DB_HOST=db
```
