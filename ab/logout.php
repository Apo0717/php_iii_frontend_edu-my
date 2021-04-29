<?php
session_start();
session_destroy();
header("Refresh: 9; url=./login.php");
require_once("templates/logout.html");