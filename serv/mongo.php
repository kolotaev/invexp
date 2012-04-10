<?php
//phpinfo();
$m = new Mongo();
$db = new MongoDB($m, 'example');
$db = $m->selectDB("example");

var_dump($db);