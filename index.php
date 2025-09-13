<?php
session_start();
include_once "./Views/layout_header.php";

if (isset($_GET['ctrl']) && ($_GET['act'])) {
    // Nếu có y/c điều hướng chuyển đến controller theo y/c
    include_once "./Controllers/".ucfirst($_GET['ctrl'])."Controller.php";
    $ctrl = new (ucfirst($_GET['ctrl'])."Controller")();
    $act= $_GET['act'];
    $args = array_splice($_GET, 2, count($_GET)- 2);
    $ctrl->$act(...$args);
} else {
    include_once "./Controllers/PageController.php";
    $ctrl = new PageController();
    $ctrl->home();
}


?>