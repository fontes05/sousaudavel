<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$email = $_POST['email'];
$senha = $_POST['senha'];

//conexao com o banco de dados
require_once("config.php");

//verifica se o usuario esta logado
$consulta_login = "SELECT * FROM `usuario` WHERE `email`='$email' AND  `senha`='$senha'";
$resultado = mysqli_query($conexao, $consulta_login);
if(mysqli_num_rows($resultado) > 0 )
{
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
header('location:../index.php');
}
else{
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  echo  '<script>alert($email)</script>';
  header('location:../login.php');
  }
