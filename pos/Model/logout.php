<?php
require_once __DIR__ . '/init.php';

$logout = new User();
$logout->logout();

header("Location: ../views/auth-login.php");
exit;
