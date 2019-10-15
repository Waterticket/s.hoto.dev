<?php
/********************************************
 * Function init
 * Copyright Waterticket All right reserved
 ********************************************/

function executequery($query = "")
{
    $i = 0;
    $return = new stdClass();
    $return->sql = $query;
    $result = mysqli_query($GLOBALS["_DB_CONN_"], $query);
    if(stripos($query, "SELECT") !== false) {
        $return->data = array();
        if($result !== false) {
            while ($row = mysqli_fetch_assoc($result)) {
                $return->data[$i] = $row;
                $i++;
            }
            $return->status = 200;
        }else{
            $return->status = 404;
        }
        $return->sum = $i;
    }else{
        $return->data = $result;
        $return->status = 300;
    }
    return $return;
}

function sql_secure($val = ""){
    return mysqli_real_escape_string($val);
}

function set_template($name = ""){
    @require_once(DOCUMENT_ROOT."/skin/".$name.".html");
}

function include_module($folder){
    $folder = htmlspecialchars(trim($folder));
    if($folder != "") {
        if($folder != '*'){
            foreach (glob("module/{$folder}/{$folder}.class.php") as $filename) {
                include $filename;
            }
        }
    }
}

function __get($var){
    return htmlspecialchars(trim($_GET[$var]));
}

function __post($var){
    return htmlspecialchars(trim($_POST[$var]));
}

function __request($var){
    return htmlspecialchars(trim($_REQUEST[$var]));
}

function isSecure() {
    return
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

function cookies($name, $val, $time = 1){
    setcookie($name, $val, $time, "/", ".".BASE_URL);
}

function check_referer($host = BASE_URL){
    if(stripos($_SERVER['HTTP_REFERER'], $host) !== false) return true;
    else return false;
}

function random_strings($length_of_string) { 
    return substr(sha1(time()), 0, $length_of_string); 
} 

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[(time() * rand(1,100)) % ($charactersLength - 1)];
    }
    return $randomString;
}

function print_obj($s){
    echo "<pre>";
    print_r($s);
    echo "</pre>";
}