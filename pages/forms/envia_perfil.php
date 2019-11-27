<?php
 //conexao com o banco de dados
 require_once("../config/config.php");

 //envio da imagem do produto
  $msg = false;
  if(isset($_FILES['campoFoto'])){
    $extensao = strtolower(substr($_FILES['campoFoto']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../imagens/upload/foto-perfil/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['campoFoto']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
   }
   
   //converte os dados post para variaveis
   $produto = $_POST['campoProduto'];
   $categoria = $_POST['campoCategoria'];
   $marca = $_POST['campoMarca'];

   //insere os dados no banco de dados
   $sql_cadastra="INSERT INTO produtos (produto, categoria, foto, marca) VALUES ('$produto','$categoria','$novo_nome','$marca')";
   
   //Confere se deu certo
   if (!mysqli_query($conexao,$sql_cadastra)){
   die('Error: ' . mysqli_error($conexao));
   }
   echo "produto cadastrado com sucesso";
   header('Location: /perfil_usuario.php');
   mysqli_close($conexao);