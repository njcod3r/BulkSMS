<?php

	/**
	 * @description BulkSMS Service To send SMS Message to Mobile Using 
	 *
	 * @author Karim Mostafa <Karim.Mostafa@e7gezly.com>
	 * 
	 * @copyright (c) 2015, E7gezly
	 */
	require_once('Request.php');

class BulkSMS  {

	/**
	 * store BaseURL API to Call
	 *
	 * @var string
	 */
	private $base_url ;

	/**
	 * store username of API to get Auth
	 *
	 * @var string
	 */
	private $username ;
	
	/**
	 * store Password of API to get Auth
	 *
	 * @var string 
	 */
	private $password ;


	/**
	 * object from class Request 
	 * 
	 * @var Object RequestClass
	 */
	 private $request ;


	/**
     * @description return base url when take obj from class Bsms
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     * 
	 * @param string $url
     * @param string $userName
     * @param string $password
     * @return 
     * @access public
     *
	*/
	public function __construct( $userName , $pwd , $url){ 
		
      	$this->request = new Request($url);
      	$this->base_url = $url ;
      	$this->username = $userName ;
      	$this->password = $pwd ;
	}


	/**	 
     * @description return message url 
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     * 
	 * @param string $message
     * @param string $language
     * @param integer $recipient like 201200000000
     * @param string $sender like E7gezly
     * @return array  
     * @access public 
     *
	*/
     public function sendSMS($sms_body , $lang , $mobile , $sender_name){
		$params = array( 
						'user_name' => $this->username ,
					 	'password' => $this->password ,
					 	'msg' => $sms_body ,'lang'=>$lang , 
					 	'recipient' => $mobile, 
					 	'sender' => $sender_name
					 	);
 		$this->request->SendRequest($params);
	}
} 

?>