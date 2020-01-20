#! /bin/bash
# 仮のドキュメントルードdirを削除
rm -rf app && echo 'Removed Default DocumentRootDir.'

echo 'Check Arguments...'

if [ "$LARAVEL_VERSION" = "" ]; then
    LARAVEL_VERSION_MSG="latest"
else
    LARAVEL_VERSION_MSG=${LARAVEL_VERSION}
fi

echo "-.-.-.-.-.-.-."
echo "Create laravel app as ${PROJECT_NAME} With the version ${LARAVEL_VERSION_MSG} !"
echo "-.-.-.-.-.-.-."
echo "wait about 20seconds..."
# アプリケーションマウントディレクトリへ移動
cd /var/www/laravel/
#laravelプロジェクト作成
composer create-project laravel/laravel ${PROJECT_NAME} --prefer-dist ${LARAVEL_VERSION}

# DocumentRootに合わせてシンボリックリンク作成
# appがデフォルトなので同一の場合はリンクは作成しない
if [ "$PROJECT_NAME" != "app" ]; then
    echo "Link PROJECT DIR to DocumentRoot."
    ln -s ./laravel/${PROJECT_NAME} /var/www/app
fi