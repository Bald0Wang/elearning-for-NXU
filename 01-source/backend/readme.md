## 安装使用
---

* 更新laravel依赖包：composer install
* 配置laravel 环境：.env
* 生成key： php artisan key:generate
* 配置laravel-admin: 
*  - php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
*  - php artisan admin:install
* 数据库：php artisan migrate
* 配置JWT：php artisan jwt:secret
* 启动：php artisan serve

## License
---

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
