<?php

global $project;
$project = 'mysite';

global $database;
$database = '';

require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');

error_reporting(E_ALL);

set_time_limit(80);
ini_set('memory_limit', '2048M');
ini_set("log_errors", "On");
ini_set("display_errors", "On");
ini_set("error_log", "soul_error.txt");
