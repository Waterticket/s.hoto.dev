<?php
/********************************************
 * Config init
 * Copyright Waterticket All right reserved
 ********************************************/

define("ESS_VERSION", "1.0.0");

$user_setting = require_once("user_conf.php");

define("BASE_URL", $user_setting['base_url']);
define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"]);

//db info
$_DB_INFO_ = new stdClass();
$_DB_INFO_->host = $user_setting['db']['host'];
$_DB_INFO_->user = $user_setting['db']['user'];
$_DB_INFO_->password = $user_setting['db']['pass'];
$_DB_INFO_->db_name = $user_setting['db']['database'];
$_DB_INFO_->db_port = $user_setting['db']['port'];
ini_set('display_errors', $user_setting['error_display']);

$_DB_CONN_ = new mysqli($_DB_INFO_->host, $_DB_INFO_->user, $_DB_INFO_->password, $_DB_INFO_->db_name, $_DB_INFO_->db_port);
if ($_DB_CONN_->connect_errno) {
    die('Connect Error: ' . $_DB_CONN_->connect_error);
}

require_once("func.init.php");
if($user_setting['ssl_only'] && (isSecure() != true))
    header('Location: https://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']);