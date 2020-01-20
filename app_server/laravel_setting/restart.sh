#! /bin/bash
rm -rf app && echo 'Removed Default DocumentRootDir.'

# DocumentRootに合わせてシンボリックリンク作成
# appがデフォルトなので同一の場合はリンクは作成しない
if [ "$PROJECT_NAME" != "app" ]; then
    echo "Link PROJECT DIR to DocumentRoot."
    ln -s ./laravel/${PROJECT_NAME} /var/www/app
fi