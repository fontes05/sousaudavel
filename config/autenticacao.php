<?php 
// session_start inicia a sessão
session_start();

// as variáveis login e senha
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

if((!isset ($email) == true) and (!isset ($senha) == true))
{
  unset($email);
  unset($senha);
  header('location:login.php');
  }