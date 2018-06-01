<?php 
  $email = $_POST['email'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
  $connect = mysql_connect('localhost','root','');
  $db = mysql_select_db('lucas');
    if (isset($entrar)) {
             
      $verifica = mysql_query("SELECT * FROM professor WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('email e/ou senha incorretos');window.location.href='loginprofessor.html';</script>";
          die();
        }else{
          setcookie("email",$email);
          header("Location:index.php");
        }
    }
?>