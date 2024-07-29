<?php
try {
    $base_com = new PDO("mysql:host=localhost;dbname=memoire", "root", "root");
} catch (Exception $e) {
    die("Erreur" . $e->getMessage());
}
?>
