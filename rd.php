<?php
require_once("./config/config.init.php");
$s = executequery("SELECT * FROM short_url WHERE rd_srl = \"".__get("d")."\"");
if($s->sum <= 0) die("URL Invaild");
else header("Location: ".base64_decode($s->data[0]["raw_url"]));
exit;