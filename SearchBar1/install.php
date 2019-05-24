<?php

$db = require './db.inc.php';
$conf = require './config.inc.php';

$stmt_createProductsTable = $db->prepare("
  CREATE TABLE IF NOT EXISTS `products` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255),
    `description` text,
    `price` int,
    `created_at` datetime DEFAULT now(),
    `updated_at` datetime DEFAULT now() ON UPDATE now(),
    `deleted_at` datetime DEFAULT null
  )
");
$stmt_createProductsTable->execute();
