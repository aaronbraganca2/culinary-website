<?php

session_start();

session_destroy();

header("Location: http://localhost/expt4/login.php");
exit;