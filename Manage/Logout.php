<?php
session_start();
	unset($_SESSION['user']);
	unset($_SESSION['pass']);
	unset($_SESSION['role']);
include("../Utils/common.php");
	common::redirectPage('Guest/HomeGuest.php');
?>