<?php

ini_set('display_errors', 1);

session_start();

define("APP_ROOT", "application/");
define("DB_ROOT", APP_ROOT."libs/db/");

require_once APP_ROOT.'libs/db/DataBase.php';

$db = DataBase::getInstance();