<?php 
session_start();

unset($_SESSION['user']);
unset($_SESSION['cart']); //temap
unset($_SESSION['msg']);

header('Location: ../index.php');