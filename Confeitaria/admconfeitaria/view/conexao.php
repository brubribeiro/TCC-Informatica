<?php
    $pdo = new PDO('mysql:host=localhost;dbname=bdconfeitaria', 'root', '');
    $pdo->exec("set names utf8");