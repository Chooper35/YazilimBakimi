<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=shopapp", "root", "");
} catch (PDOException $e) {
    print $e->getMessage();
}
