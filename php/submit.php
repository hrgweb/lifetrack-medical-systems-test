<?php

// IMPORT CLASS
include_once './class/Study.php';
include_once './class/Table.php';

// CLASS INSTANTIATION
$study = new Study();
$table = new Table();

echo $table->display($_GET);
