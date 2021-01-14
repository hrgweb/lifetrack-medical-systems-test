<?php

include_once 'class/Table.php';
include_once 'class/Study.php';

echo (new Table(new Study($_GET)))->display();
