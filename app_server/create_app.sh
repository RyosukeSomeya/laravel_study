#! /bin/bash

# imageをビルド
docker-compose build --no-cache
docker-compose up -d
s
# コンテナへアタッチ
docker exec -it app_server /bin/bash