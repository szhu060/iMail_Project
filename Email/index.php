<?php

require_once('vendor/autoload.php');
require_once('db.php');

// 为了便于大家都能用 response一个头文件 告诉大家返回什么类型什么的
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$param = $_GET['param'];


//1.email/add
//2. email
//3.email/delete/{id}
//4.send

//用／来分开 将$param变成index array,变成参数式的 
$param_array = explode('/',$param); 
// echo '<pre>';
// print_r($param_array);
// echo '</pre>';

//$param_array[0] = email
if(!file_exists($param_array[0] . '.php')){
	echo "Sorry,wrong route";
	exit;
}

require_once($param_array[0] . '.php');

$handle_obj = new $param_array[0]();

if(array_key_exists(1, $param_array)){
	$method = $param_array[1] . 'Method';

}else{
	$method = 'indexMethod';
}

if(array_key_exists(2, $param_array)){
	echo $handle_obj->$method($param_array[2]);

}else{
	echo $handle_obj->$method();
}






?>