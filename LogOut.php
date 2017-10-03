<?php
session_start();
$_SESSION['Name']='random';
$_SESSION['key']=0;
session_destroy();
header('refresh:0; url=index.html');
?>