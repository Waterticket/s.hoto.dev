<?php
require_once("./config/config.init.php");
if(!empty(__post("url"))){
    if(!check_referer()) die("0");
    $timestamp = time();
    $srl = generateRandomString(10);
    mysqli_query($_DB_CONN_,"INSERT INTO short_url(rd_srl, raw_url, ins_date) VALUES (\"".$srl."\", \"".base64_encode(__post("url"))."\", \"".$timestamp."\")");
    echo "Changed URL: <a href=\"https://".BASE_URL."/r/".$srl."\">https://".BASE_URL."/r/".$srl."</a>";
}else{1
?>
<title>Fast Url Shorter</title>
Fast Url Shorter<br>
<form action="/" method="POST">
URL : <input type="input" name="url"> <button type="submit">Convert</button>
</form>
<?}?>