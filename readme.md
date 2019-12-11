
## 关于laravel-adminlte

laravel-adminlte 通过轻量级前端框架adminLte和laravel框架搭建的后台模版，它没有laravel-admin后台那么庞大复杂。个人也比较喜欢adminlte的样式设计，感觉要比layuiAdmin好看很多。
- [laravel](https://laravel.com).
- [adminLte](https://adminlte.io/).


## 主要功能介绍
#### 1.laravel自带auth登录功能;
#### 2.使用iframe架构;
#### 3.实现管理员,角色,菜单,权限的RBAC权限功能;
#### 4.配套菜单管理,管理员管理,角色管理,权限管理;
#### 5.调用了icheck,datepicker,select2,datatable等jquery插件,并通过Mix统一编译.

## 项目截图

![image](https://jingze.oss-cn-beijing.aliyuncs.com/jzblog/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20191210172504.png)
![image](https://jingze.oss-cn-beijing.aliyuncs.com/jzblog/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20191210173354.png)

## 安装

#### 1.克隆下代码后,composer安装
```
composer install
```
#### 2.创建key,并创建.env进行相关配置

```
php artisan key:generate
```
#### 3.数据库迁移

```
php artisan migrate
```

#### 4.添加必要数据

```
php artisan db:seeder
```
> admin为超级用户,拥有所有菜单和权限.

