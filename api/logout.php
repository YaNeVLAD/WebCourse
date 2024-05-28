<?php
require_once __DIR__ . '/../sessionFunctions.php';

closeSession();
header('Location: /home');
die();