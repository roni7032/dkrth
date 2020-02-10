<?php session_start();

session_destroy();
include_once('url.php');
/*----/end line----*/
$new_url=base_url();
Redirect($new_url, false);