<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Guzzle\Http\Message\Response;

	/**
	 * @description Request to send sms using Guzzle  
	 *
	 * @author Karim Mostafa <Karim.Mostafa@e7gezly.com>
	 * 
	 * @copyright (c) 2015, E7gezly
	 */


 Class Request {

 	/**
	 * store BaseURL API to Call
	 *
	 * @var string
	 */
	private $base_uri ;

	/**
	 * store ClientRequest object from class client Guzzle
	 *
	 * @var string
	 */
	private $client_request ;

	/**
     * @description return base url when take obj from class Bsms
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     * 
	 * @param string $url
     * @param ObjectGuzzle $client
     * @return 
     * @access public
     *
	*/
	public function __construct($uri = null){
		
		if ($uri !== null) {
			$this->base_uri = $uri ;
       		$this->client_request = new GuzzleHttp\Client(['base_uri' => $this->base_uri]);
		}
       
	}



	/**
     * @description send request from to service SMS
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     * 
	 * @param string $method     [POST, 'GET', 'PUT' or 'DELETE']
     * @param string $uri
     * @param array  $params
     * @param string $headers
     * @return array 
     * @access public
     *
	*/
	public function SendRequest($params ,$method = 'POST', $headers = null ){
		try {
			
			$client = new GuzzleHttp\Client([
			    // Base URI is used with relative requests
			    'base_uri' => $this->base_uri 
			]);
		
			//$array = array('user_name' => 'E7GEZLY','password' => 'BSMS','msg' => 'TEST', 'recipient' => '201281264677' , 'sender' => 'E7GEZLY', 'lang' => 'en');

			// $response = $client->request($method,$this->base_uri .'user_name='. $params['user_name'] .'&password='. $params['password'] .'&msg='. $params['msg'] .'&lang='. $params ['lang'] .'&recipient='. $params['recipient'] .'&sender='. $params['sender'] , array(), array(
			// 						    	'query' => ['user_name' => $params['user_name'] ,'password' => $params['password'],'msg' => $params['msg'] ,'lang' => $params ['lang'] , 'recipient' => $params['recipient'] , 'sender' => $params['sender'] ]
			// 								));

			$respone = $this->client_request->request($method,$this->base_uri , 
														[
												    		'query' => ['user_name' => $params['user_name'] ,
												    					'password' => $params['password'],
												    					'msg' => $params['msg'] ,
												    					'lang' => $params ['lang'] , 
												    					'recipient' => $params['recipient'] , 
												    					'sender' => $params['sender']
												    	]
										    		])->getBody()->getContents();

			
	  	var_dump($respone);
	  	
		} catch (RequestException $e) {
		    echo $e->getRequest();
		    if ($e->hasResponse()) {
		        echo $e->getResponse();
		    }
		}
	}
 }

?>