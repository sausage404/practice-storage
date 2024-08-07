<?php
session_start();
session_destroy();
header('Location: /test-mode/auth/login.php');
exit;