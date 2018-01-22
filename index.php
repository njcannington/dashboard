<?php
require "autoload.php";

use Lib\Bootstrap\Bootstrap;

$bootstrap = new Bootstrap();
$data = $bootstrap->getData();

require "dashboard.html";
