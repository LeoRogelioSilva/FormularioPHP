<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:login.php');
  }

$logado = $_SESSION['email'];
?>