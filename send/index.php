<?php
// This file will handle the request coming to route
// 'localhost/send'. I am just doing a folder-based routing
// just cause it is faster to implement.

// Required parameter for this endpoint,
// POST /send
$requiredParams = array(
  'mno',
  'msg'
);

// To indicate whether all required Parameters
// are present or not. If 'false', it means
// all parameters are present.
$err = false;

// Basic validation check to make sure
// required parameter exist in request body.
  foreach ($requiredParams as $key => $param) {
  if(!array_key_exists($param,$_REQUEST)){
    // 'True' to indicate that a parameter
    // is missing
    $err = true;
    break;
  }
}

if($err){
  // '422' Unprocessable Entity indicate that
  // we cannot proccess the request. A common HTTP response code
  // used in REST API.
  http_response_code(422);
  // As per defined requirement
  echo "ERR";
}else{
  // If all required param exist.
  http_response_code(200);
  // As per defined requirement
  echo "OK";
}
