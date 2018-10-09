<?php

require_once 'conexao.php';

 $nome = mysqli_escape_string($conexao, $_POST['name']);
 $telefone = mysqli_escape_string($conexao, $_POST['telefone']); 
 $email = mysqli_escape_string($conexao, $_POST['email']);
 $messagem = mysqli_escape_string($conexao, $_POST['message']);

 $inserir = "INSERT INTO dados (nome, telefone, email, mensagem, id) VALUES ('$nome', '$telefone', '$email', '$messagem', '$id')";
 $sql = mysqli_query($conexao, $inserir);

 if (mysqli_insert_id($conexao)) {
 	header('Location: contact.html');
 }else{
 	header('Location: contact.html');
 }

?>