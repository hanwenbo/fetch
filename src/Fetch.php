<?php
namespace hanwenbo\fetch;
use EasySwoole\HttpClient\Bean\Response;

/**
 *
 * Copyright  FaShop
 * License    http://www.fashop.cn
 * link       http://www.fashop.cn
 * Created by FaShop.
 * User: hanwenbo
 * Date: 2022/3/8
 * Time: 21:20
 *
 */
class Fetch
{
	/**
	 * @param string $method
	 * @param string $url
	 * @param array  $params
	 * @author 韩文博
	 */
	public function request( string $method, string $url, array $params = null ) : Response
	{
		$client = new \EasySwoole\HttpClient\HttpClient( $url );

		if( isset( $params['header'] ) && !empty( $params['header'] ) && is_array( $params['header'] ) ){
			$client->setHeaders( $params['header'], true, false );
		}

		switch( $method ){
		case 'GET' :
			if( $params && isset( $params['query'] ) ){
				$client->setQuery( $params['query'] );
				$response = $client->get();
			}
		break;
		case 'POST' :
			if( $params && isset( $params['form_params'] ) ){
				$response = $client->post( $params['form_params'] );
			} elseif( $params && isset( $params['body'] ) ){
				$response = $client->postJson( json_encode( $params['body'] ) );
			}
		break;
		case 'PUT' :
			if( $params && isset( $params['form_params'] ) ){
				$response = $client->put( $params['form_params'] );
			} elseif( $params && isset( $params['body'] ) ){
				$response = $client->put( json_encode( $params['body'] ) );
			}
		break;
		case 'DELETE' :
			if( $params && isset( $params['form_params'] ) ){
				$response = $client->delete( $params['form_params'] );
			} elseif( $params && isset( $params['body'] ) ){
				$response = $client->delete();
			}
		break;
		case 'PATCH' :
			if( $params && isset( $params['form_params'] ) ){
				$response = $client->patch( $params['form_params'] );
			} elseif( $params && isset( $params['body'] ) ){
				$response = $client->patch( json_encode( $params['body'] ) );
			}
		break;
		default:
			throw new \InvalidArgumentException( "method error" );
		}

		return $response;
	}
}