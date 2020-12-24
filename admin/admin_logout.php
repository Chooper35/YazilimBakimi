<?php
ob_start();
session_start();

unset($_SESSION['admin']);
header("Location: /");