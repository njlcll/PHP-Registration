<?php
require_once('../config.php');
$body = file_get_contents('php://input');
echo "<pre>";
print_r($_SESSION);

$stats = json_decode($body);

   

