<?php

// echo "exist!";
class send {
	// function __construct(){
	// 	echo "send object class is created";
	// }

	/*
	* Method otherMethod
	* 
	*/
//	public function otherMethod(){
//		echo "Using Add Method";
//	}

/*
 * request:
 * method:post
 * url:send
 * data:
 * {
 *  "id":"3",
 *  "rcpt":"info@gmail.com
 * }
 * will return:
 *
 */
	
	public function indexMethod(){
		$tid = $_POST['id'];
		$recipient = $_POST['rcpt'];
		$conn = new DBConnection();
		$result = $conn->getTemplateById($tid);

		try{
		    $mandrill = new Mandrill('aSznWSiyxJ8Kv-JemSNvgQ');
		    $message = array(
		      'html' => $result['content'],
		      'subject' => $result['name'],
                'from_email' => 'postman@sunnyfuture.ca',
                'from_name' => 'Josh',
                'to' => array(
                    array(
                        'email' => $recipient,
                        'type' => 'to'
                    )
                ),
                'headers' => array(
                    'Reply-To' => '410483224@qq.com'
                ),
                'important' =>true,
                'track_opens' =>true,
                'track_clicks' =>true

            );
		    $async = false;
		    $ip_pool = 'Main Pool';
		    $result = $mandrill->messages->send($message,$async,$ip_pool);
		    return json_encode(array(
		       'code' => 200,
               'message' =>'success'
            ));
        }catch (Mandrill_Error $e){
		    return json_encode(array(
		       'code' =>400,
		       'message' =>"fail"
            ));
        }

	}

}

?>