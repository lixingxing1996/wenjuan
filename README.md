DCXT微型调查系统。v1.0测试版本
===============
## 安装
1，更改Application里面的database.php 改为自己的数据库信息，并把目录下的exam.sql导入
2，虚拟主机指向public，而不是根目录，确认好public的.htaccess
	<IfModule mod_rewrite.c>
	  Options +FollowSymlinks -Multiviews
	  RewriteEngine On

	  RewriteCond %{REQUEST_FILENAME} !-d
	  RewriteCond %{REQUEST_FILENAME} !-f
	  RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
	</IfModule>
3，后台地址：域名/admin/login/index
4，默认账户及登录密码：admin admin


## 目录结构

初始的目录结构如下：

www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─admin              后台目录
│  │  ├─config.php      后台配置文件
│  │  ├─common.php      后台函数文件
│  │  ├─controller      后台控制器目录
│  │  ├─model           后台模型目录
│  │  ├─view            后台视图目录
│  │  └─validate        后台验证目录
│  │ 
│  │─home               前台目录
│  │  ├─config.php      前台配置文件
│  │  ├─common.php      前台函数文件
│  │  ├─controller      前台控制器目录
│  │  ├─model           前台模型目录
│  │  ├─view            前台视图目录
│  │  └─validate        前台验证目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件
~~~

> router.php用于php自带webserver支持，可用于快速测试
> 切换到public目录后，启动命令：php -S localhost:8888  router.php
> 上面的目录结构和名称是可以改变的，这取决于你的入口文件和配置参数。


## 版权信息

ThinkPHP遵循Apache2开源协议发布，并提供免费使用。

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2006-2017 by ThinkPHP (http://thinkphp.cn)

All rights reserved。

ThinkPHP® 商标和著作权所有者为上海顶想信息科技有限公司。

更多细节参阅 [LICENSE.txt](LICENSE.txt)
