# 部署清单 — Linux XAMPP

- [x] **上传项目** — 将项目压缩后通过 `rz` 上传到服务器
- [x] **解压到 htdocs** — `unzip` 到 `/opt/lampp/htdocs/web_hw4`
- [x] **配置环境** — `cp .env.example .env`，修改数据库连接为本地 XAMPP（`DB_HOST=127.0.0.1`、`DB_USERNAME=root`、`DB_PASSWORD=`）
- [x] **生成应用密钥** — `/opt/lampp/bin/php artisan key:generate`
- [x] **安装 Composer** — 如未安装则下载（`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`）
- [x] **安装依赖** — `/opt/lampp/bin/php composer.phar install --no-dev --optimize-autoloader`
- [x] **创建数据库** — `/opt/lampp/bin/mysql -u root -e "CREATE DATABASE web_hw4_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"`
- [x] **运行迁移** — `/opt/lampp/bin/php artisan migrate`（建用户表、session 表等）
- [x] **创建存储链接** — `/opt/lampp/bin/php artisan storage:link`（头像上传用）
- [x] **设置目录权限** — `chmod -R 777 storage bootstrap/cache`
- [x] **访问测试** — 打开 `http://服务器IP/web_hw4/public/register` 验证部署成功
