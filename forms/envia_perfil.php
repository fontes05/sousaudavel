<?php
 //conexao com o banco de dados
 require_once("../config/config.php");

 //envio da imagem do produto
  if(isset($_FILES['campoFoto'])){
    $extensao = strtolower(substr($_FILES['campoFoto']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../images/upload/foto-perfil/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['campoFoto']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
   }
   
   //converte os dados post para variaveis
   $nome = $_POST['campoNome'];
   $sobrenome = $_POST['campoSobrenome'];
   $email_update = $_POST['campoEmail'];
   $senha_update = $_POST['campoSenha'];

   //consulta tabela e converte variavel
   //se o campo de upload estiver vazio, insere os dados no bd menos no campo foto
   if($_FILES['campoFoto']['name'] == "") {
    $sql_cadastra="UPDATE `usuario` SET `nome`='$nome',`sobrenome`='$sobrenome',`email`='$email_update',`senha`='$senha_update' WHERE 1";
   }else{
     //se tiver foto no upload, subtsitui a foto, inserindo os dados no bd
    $sql_cadastra="UPDATE `usuario` SET `nome`='$nome',`sobrenome`='$sobrenome',`email`='$email_update',`senha`='$senha_update',`foto_perfil`='$novo_nome' WHERE 1";
   }
    
   //Confere se deu certo
   if (!mysqli_query($conexao,$sql_cadastra)){
   die('Error: ' . mysqli_error($conexao));
   }
   echo "<script>alert('produto cadastrado com sucesso');</script>";
   //echo isset($_FILES);
   header('Location: ../perfil_usuario.php');
   mysqli_close($conexao);