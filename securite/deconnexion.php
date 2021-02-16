<?php
session_start();

session_regenerate_id(true);
unset($_SESSION["user"]);

header("location:/securite/index.php");
