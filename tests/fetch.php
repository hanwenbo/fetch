<?php
include_once "./vendor/autoload.php";

go( function(){
	$client = new \hanwenbo\fetch\Fetch();
	$res    = $client->request( 'GET', 'https://www.baidu.com', [
		'header'=>[
			'test'=>1
		],
		'query' => [
			'adada' => 121212,
		],
	] );
	var_dump( $res );
} );
