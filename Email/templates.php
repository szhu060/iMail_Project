<?php

// echo "exist!";
class templates {
	// function __construct(){
	// 	echo "templates object class is created";
	// }

	// public function addMethod(){
	// 	echo "Using ADD Method";
	// }

	/*
	* @Method otherMethod
	* @input int id input id to delete
	* @Output boolean if true delete
	* 加上detail -- Current  
	*/
	// public function deleteMethod($id){
	// 	echo 'Using Delete Method' . $id;

	// 	return true;
	// }
	public function indexMethod(){
		return "template index action is working";
	}

	/* Method: POST
	 * URL : template/save
	 * 
	 * Request body format
	 * request - post:
	 *
	 *{
	 *	"content" : "<h1> content</h1>",
	 *  "name" : "template 1",
	 *  "var" : "var1;var2"
	 *}
	 * will return format:json
	 * {
	 *	"code":200,
	 *	"message":"success"
	 * }
	 */

	public function saveMethod(){
		$content = $_POST['content'];
		$name = $_POST['name'];
		$var = $_POST['var'];

		$conn = new DBConnection();
		$result = $conn->addTemplate($content, $name, $var);

		if($result){
			return json_encode(array(
				'code' => 200,
				'message' => "template add successfully"
			));
		}else{
			return json_encode(array(
				'code' => 500,
				'message' => "template add fail"
			));
		}
	}

	/*
	* Request body format
	* Method :GET
	* url: templates/get
	* will: return:json
	* [
	*	{
	*		"id" : 1,
	*		"content" : "hello",
	*		"name" : "template 1",
	*  		"var" : "var1;var2"
	*	},
	*	{
	*		"id" : 2,
	*		"content" : "hello",
	*		"name" : "template 2",
	*  		"var" : "var1;var2"
	*	}
	* ]
	*/

	public function getMethod(){
		$conn = new DBConnection();
		$results = $conn->getAllTemplates();

		if($results){
			return json_encode($results);
		}else{
			return json_encode(array(
				'code' => 400,
				'message' => "no template exists"
			));
		}
	}



}

?>