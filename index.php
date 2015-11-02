<?php

define("NL", "\n");
require __DIR__ . "/vendor/autoload.php";

$app = \Andou\InstantWin::app();

if ($app->win()) {
  echo "thou win!" . NL;
} else {
  echo "thou not win! :(" . NL;
}