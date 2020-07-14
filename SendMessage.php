<?php
/*********************************************
File Name : SendMessage.php
Run : php SendMessage.php
/*********************************************/

/*********************************************
- Requires php cURL extension to be installed
- Requires php 7
/*********************************************/

// Original Url was https://192.168.1.8/send/.
// According to the IP, I am assuming it is a
// HTTP request to localhost if its
// in a development environment.
// So i changed it to localhost/send to avoid
// having to change host file configuration and such.
$url = 'localhost/send/';
// Changing the parameters variable name will cause the
// HTTP request to fail and return "ERR".
$mno = '+6591234567';
$msg = 'Test Message';

Send($mno,$msg);

function Send($mno,$msg) {
  // Determine in what environment PHP is running from,
  // If cli, set line break to be '\n',
  // else we're assuming it is running in a web browser,
  // so line break will be <br>. This is just to make displaying
  // message a little bit prettier.
  $lbreak;
  if(php_sapi_name()=='cli'){
    $lbreak="\n";
  }else{
    $lbreak="</br>";
  }

  global $url;
  echo "Sending message to URL: $url".$lbreak;

  // Request parameters
  $params = array(
    "mno" => $mno,
    "msg" => $msg
  );
  // URL encoded request parameters
  $encodedParams = http_build_query($params);

  // curl instance
  $ch = curl_init();
  // set Request url
  curl_setopt($ch,CURLOPT_URL,$url);
  // set HTTP verb to POST
  curl_setopt($ch,CURLOPT_POST,true);
  // set request body
  curl_setopt($ch,CURLOPT_POSTFIELDS, $encodedParams);
  // return the transfer as a string of the return value of curl_exec()
  // instead of outputting it directly.
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

  // Make Curl request
  $result = curl_exec($ch);

  // Get HTTP status codes
  $responseCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

  if($responseCode==200){
    echo "Message sent successfully".$lbreak;
  }else{
    echo "Error. Please check with administrator".$lbreak;
  }
}

?>
