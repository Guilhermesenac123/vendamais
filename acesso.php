<?php
//importando arquivo de conexão com o banco 
include 'conexao.php';

//recebendo dados da tela de login
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

//echo "Olá seu cpf: $cpf e senha: $senha";//


$sql = "SELECT * FROM usuario WHERE cpf='$cpf' AND senha= '$senha' ";

$resultado = mysqli_query($conexao, $sql);

$colunas = mysqli_fetch_assoc($resultado);


if(mysqli_num_rows($resultado) > 0){
  // echo "Login efetuado com sucesso!";//
  session_start();
  $_SESSION['usuario'] = $colunas['nome'];
  $_SESSION['cpf'] = $cpf;
  $_SESSION['senha'] = $senha;

  header('location: principal.php');
}else{
   //echo "Errooouu! não encontrado!";//

   session_unset();
   session_destroy();
   header('location: principal.php');
}
?>