# 部署清单 — Linux XAMPP

- [x] 将项目压缩，`rz` 上传到服务器
- [x] 解压到 `/opt/lampp/htdocs/web_hw4`
- [x] `cp .env.example .env`，编辑数据库配置（`DB_HOST=127.0.0.1`、`DB_USERNAME=root`、`DB_PASSWORD=`）
- [x] `/opt/lampp/bin/php artisan key:generate`
- [x] 安装 Composer（已装则跳过）
- [x] `/opt/lampp/bin/php composer.phar install --no-dev --optimize-autoloader`
- [x] `/opt/lampp/bin/mysql -u root -e "CREATE DATABASE web_hw4_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"`
- [x] `/opt/lampp/bin/php artisan migrate`
- [x] `/opt/lampp/bin/php artisan storage:link`
- [x] `chmod -R 777 storage bootstrap/cache`
- [x] 访问 `http://服务器IP/web_hw4/public/register` 测试
