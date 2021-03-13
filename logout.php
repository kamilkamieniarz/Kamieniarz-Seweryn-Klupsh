<?php

session_start();
unset($_SESSION['logged_id']);
session_destroy();

header('Location: index.php');
