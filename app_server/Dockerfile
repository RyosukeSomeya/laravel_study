
FROM alpine:3.11.2

ENV TIMEZONE Asia/Tokyo

RUN apk update && apk upgrade
# 基本コマンドインストール
RUN apk add bash vim curl

# apache,php7動作用モジュールインストール
RUN apk add apache2 php7-apache2 openrc --no-cache
RUN mkdir /run/openrc/
RUN touch /run/openrc/softlevel
#　設定は現状 localhostで接続可能（ポート80）
COPY ./httpd.conf /etc/apache2/httpd.conf

# phpと関連モジュールインストール
RUN apk add php7 php7-pdo_mysql php7-openssl php7-curl php-phar \
    php7-json php7-mbstring php7-opcache php7-pdo_odbc php7-dom \
    php7-simplexml php7-xml php7-pdo_mysql php7-gd php7-pecl-apcu \
    php7-xmlwriter php7-xmlreader php7-mysqli php7-tokenizer php7-session

# composerインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

# laravelインストール設定用shファイル
COPY ./laravel_setting/setting.sh /var/www/setting.sh
COPY ./laravel_setting/restart.sh /var/www/restart.sh
RUN chmod +x /var/www/setting.sh
RUN chmod +x /var/www/restart.sh

# apache起動用
WORKDIR /var/www/
RUN mkdir -p app/public

# apache起動
CMD ["/usr/sbin/httpd", "-DFOREGROUND"]
