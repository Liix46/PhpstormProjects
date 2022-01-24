<?php

use JetBrains\PhpStorm\NoReturn;

$method = strtoupper($_SERVER['REQUEST_METHOD']);

switch ($method){
    case 'GET' :    doGet();    break;
    case 'POST':
        if ("file" == $dtl)
            doPostFile();
        else
            doPost();
        break;
    case 'PUT' :    doPut();    break;
    case 'DELETE':  doDelete(); break;
    case 'PATCH':   doPatch();  break;
    default: send418();
}

function doGet(){
    if ( !isset($_GET['x'])){
        send412("Parameter 'x' required");
    }
    if (! is_numeric($_GET['x'])){
        send412("Parameter 'x' should be numeric");
    }
    if ( !isset($_GET['y'])){
        send412("Parameter 'y' required");
    }
    if (! is_numeric($_GET['y'])){
        send412("Parameter 'y' should be numeric");
    }
    $x = $_GET['x'];
    $y = $_GET['y'];

    echo "GET API works x=$x, y=$y";
}

function doPost(){
   // var_dump($_POST);
    $contentType = strtolower( trim($_SERVER ['CONTENT_TYPE']));
    if ($contentType == "application/json"){
        $body = file_get_contents("php://input");
        $data = json_decode($body, true);
        if (JSON_ERROR_NONE !== json_last_error()){
            send412("JSON parse error");
        }
        $x = $data ['x'];
        $y = $data ['y'];
        echo "POST API works with x=$x, y=$y";
    }else if ($contentType == "application/x-www-form-urlencoded"){
        var_dump( $_POST );
    }else  {
        send415();
    }
}

function doPut(){
    //echo "PUT works";
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    if (JSON_ERROR_NONE !== json_last_error()){
        send412("JSON parse error");
    }
    $x = $data ['x'];
    $y = $data ['y'];
    echo "PUT API works with x=$x, y=$y";
}

function doDelete(){
    //echo "DELETE works";
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    if (JSON_ERROR_NONE !== json_last_error()){
        send412("JSON parse error");
    }
    $x = $data ['x'];
    $y = $data ['y'];
    echo "DELETE API works with x=$x, y=$y";
}

function doPatch(){
    echo"<pre>";
    print_r($_FILES);
    print_r($_SERVER);
}
function doPostFile(){
    /*echo"<pre>";
    print_r($_FILES);
    print_r($_SERVER);*/
    if(empty($_FILES['userFile'])){
        sendError( [
            'code' => 412,
            "File must be attached"
        ]);
    }
    if ($_FILES['userFile']['error'] !=0){
       sendError(500, "Error uploading file");
    }
    if ($_FILES['userFile']['size'] ==0) {
        sendError("Empty file not allowed");
    }
    $savedName = $_FILES['userFile']['name'];
    $cnt = 1;
    while(file_exists("uploads/" . $savedName)){
        $savedName = "($cnt)_" . $_FILES['userFile']['name'];
        $cnt += 1;
    }
    if (move_uploaded_file(
        $_FILES['userFile']['tmp_name'],
        "uploads/". $_FILES['userFile']['name'])){
        echo "Upload OK";
    }
    else{
        sendError("Upload fails");
    }
}
/////////////

/*function doPut(){
    $contentType = strtolower( trim($_SERVER ['CONTENT_TYPE']));
    if ($contentType == "application/json"){
        $body = file_get_contents("php://input");
        $data = json_decode($body, true);
        if (JSON_ERROR_NONE !== json_last_error()){
            send412("JSON parse error");
        }
        $x = $data ['x'];
        $y = $data ['y'];
        echo "PUT API works with x=$x, y=$y";
    }else if ($contentType == "application/x-www-form-urlencoded"){
        var_dump( $_POST );
    }else  {
        send415();
    }
}*/

/*function doDelete(){
    $contentType = strtolower( trim($_SERVER ['CONTENT_TYPE']));
    if ($contentType == "application/json"){
        $body = file_get_contents("php://input");
        $data = json_decode($body, true);
        if (JSON_ERROR_NONE !== json_last_error()){
            send412("JSON parse error");
        }
        $x = $data ['x'];
        echo "POST API works with x=$x";
    }else if ($contentType == "application/x-www-form-urlencoded"){
        var_dump( $_POST );
    }else  {
        send415();
    }
}*/

///////////////

#[NoReturn]
function send412($msg = ""){
    http_response_code(412);
    echo $msg;
    exit;
}

#[NoReturn]
function send415($msg = null){
    http_response_code(415);
    if (is_null($msg)){
        $msg = "Unsupported Media Type";
    }
    echo  $msg;
    exit;
}

#[NoReturn]
function send418(){
    http_response_code(418);
    echo "API method does not support";
    exit;
}
