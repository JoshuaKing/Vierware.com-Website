<?php
require_once("log.php");

log_to_sql("[Ajax Error] Page: ".$_POST['page'].", Error Code: ".$_POST['error'].", Error Text: ".$_POST['errortext']);

?>