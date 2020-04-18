<h1 align="center">Welcome to Laravel Shop 👋</h1>
<p>
<img alt="Version" src="https://cdn.learnku.com/uploads/images/202003/29/25461/BoWaEiJMIB.svg" />
<a href="larabbs.strive.net.cn">
<img alt="Documentation" src="https://cdn.learnku.com/uploads/images/202003/26/25461/7UiCy5eI7M.svg" target="_blank" />
</a>
<a href="License Url">
<img alt="License: License" src="https://img.shields.io/badge/License-License-yellow.svg" target="_blank" />
</a>
<a href="https://twitter.com/Twitter">
<img alt="Twitter: Twitter" src="https://cdn.learnku.com/uploads/images/202003/26/25461/s5JUye1vfD.svg" target="_blank" />
</a>
</p>

> 一个基于 Laravel 6.* 的单商户电商平台

### 🏠 [Homepage](https://shop.learnku.fit/)

## Install

1. 克隆源代码：`git clone https://github.com/lucifer103/laravel-shop.git`；
2. 环境配置：
	* **`Homestead`**
		* 运行以下命令编辑 `Homestead.yaml` 文件：`homestead edit`
		* 加入对应修改，如下所示：
			``` yaml
			folders:
			- map: ~/my-path/larabbs/    # 你本地的项目目录地址
			to: /home/vagrant/laravel-shop
			sites:
			- map: shop.test
			to: /home/vagrant/laravel-shop/public
			databases:
			- laravel-shop
			``` 
		* 修改完成后保存，然后执行以下命令应用配置信息修改：`homestead provision`
	> 注意：有些时候你需要重启才能看到应用。运行 `homestead halt` 然后 `homestead up` 进行重启。
	* **`Laradock`**
		 * 进入 `Laradock` 目录，运行 `docker-compose up -d elasticsearch kibana laravel-horizon mailhog mysql nginx php-fpm phpmyadmin redis redis-webui workspace` 启动容器；
		 * 进入 `Laradock/nginx/sites` 目录下新建 `shop.conf` 文件，写入以下代码：
		   ``` conf
		   server {
				listen 80;
				server_name shop.test;
				root /var/www/PHP/Code/laravel-shop/public;
				index index.php index.html index.htm;

				location / {
					 try_files $uri $uri/ /index.php$is_args$args;
				}

				location ~ \.php$ {
					try_files $uri /index.php =404;
					fastcgi_pass php-upstream;
					fastcgi_index index.php;
					fastcgi_buffers 16 16k;
					fastcgi_buffer_size 32k;
					fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
					#fixes timeouts
					fastcgi_read_timeout 600;
					include fastcgi_params;
				}

				location ~ /\.ht {
					deny all;
				}

				location /.well-known/acme-challenge/ {
					root /var/www/letsencrypt/;
					log_not_found off;
				}
			}
		   ``` 
		 * 重启 `nginx` 容器：`docker-compose restart nginx`;
3. 安装扩展包依赖：`composer install`；
4. 生成配置文件：
	 * 首先执行：`cp .env.example .env`；
	 * 修改数据库信息；
	 * 使用 `Laradock` 的注意事项：
		 * `DB_HOST` 请填写为 `mysql`；
		 * 数据库需要自己创建
5. 生成密钥：`php artisan key:generate`；
6. 执行迁移：`php artisan migrate`；
7. 执行填充：`php artisan db:seed`；
8. 配置 `hosts` 文件：`172.17.0.1    shop.test`
9. 安装依赖包：`npm install`；
10. 编译前端内容：`npm run dev`；

## Author

👤 **Lucifer 103**

* Twitter: [@Twitter](https://www.learnku.fit/)
* Github: [@lucifer103](https://github.com/lucifer103)

## 🤝 Contributing

Contributions, issues and feature requests are welcome！
Feel free to check [issues page](https://github.com/lucifer103/laravel-shop/issues).

## Show your support

Give a ⭐️ if this project helped you!

<a href="https://www.patreon.com/Patreon">
<img src="https://cdn.learnku.com/uploads/images/201912/16/25461/sXfCIoQM0E.png!large" width="160">
</a>

## 📝 License

Copyright © 2019 [Lucifer 103](https://github.com/lucifer103/).<br />
This project is [License](License Url) licensed.

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
