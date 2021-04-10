<?php

include "db.php";

$content = $_POST['text'];

mysqli_query($conn, "insert into messages values (NULL, '$content', NOW())");

echo @$_COOKIE["message_id"];
?>