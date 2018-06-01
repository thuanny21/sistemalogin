<?php 
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('lucas');
$query_select = "SELECT email FROM professor WHERE email = '$email'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];
 
  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='cadastroprofessor.html';</script>";
 
    }else{
      if($logarray == $email){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse email já existe');window.location.href='cadastroprofessor.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO professor (email,senha) VALUES ('$email','$senha')";
        $insert = mysql_query($query,$connect);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='loginprofessor.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastroprofessor.html'</script>";
        }
      }
    }

