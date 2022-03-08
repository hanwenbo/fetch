# 协程Http请求客户端

> 该类主要是为了解决第三方包用了guzzle基础请求方法保持一致，又能使用EasySwoole
## 安装
```
composer require hanwenbo/fetch
```
## 测试

```
php tests/fetch.php
```

> 要在`swoole` 环境下运行，根目录的 `docker-compose.yml` 是写项目经常用到的docker环境
> docker-compose up -d 
> docker-compose exec swoole bash
> composer install
> php tests/fetch.php



## 示例代码

#### GET

```php
$client = new \hanwenbo\fetch\Fetch();
	$res    = $client->request( 'GET', 'https://www.baidu.com', [
    'header'=>[
			'test'=>1
		],
		'query' => [
			'adada' => 121212,
		],
	] );
```

#### POST 

> form请求

```php
$client = new \hanwenbo\fetch\Fetch();
	$res    = $client->request( 'POST', 'https://www.baidu.com', [
    'header'=>[
			'test'=>1
		],
		'form_params' => [
			'adada' => 121212,
		],
	] );
```


> json请求

```php
$client = new \hanwenbo\fetch\Fetch();
	$res    = $client->request( 'POST', 'https://www.baidu.com', [
    'header'=>[
			'test'=>1
		],
		'body' => [
			'adada' => 121212,
		],
	] );
```

> 其他的 `PUT` `DELETE`  `PATCH` 参考 `POST` 即可





### 其他

- https://www.fashop.com/

- http://www.easyswoole.com/Components/httpClient.html

- https://github.com/easy-swoole/http-client
- https://guzzle-cn.readthedocs.io/zh_CN/latest/
- https://www.swoole.com/
