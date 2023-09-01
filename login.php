<!-- Área de login -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    
    <link rel="stylesheet" href="login.css">

</head>
<body>


<form action="login.php" method="post" class="form2" >
      
      <h1> Login </h1>

      <div >
       
        <input type="email" name="email" placeholder="E-mail:"
         class="email" required />
    </div>

    <div >
       <input type="password" name="senha" placeholder="Senha:" 
       class="senha" required />
    </div>


    <div>
    <a href="tela_tema.html"><button class="botao1"> Entrar </button> </a>

    </div>

</form>
</body>
</html>

<?php

if(isset($_POST['email']) && isset($_POST['senha'])){
   include('conexao.php');
   $email= $_POST['email'];
   $senha= $_POST ['senha'];
   
   $sql= "SELECT * FROM cadastro WHERE email='$email' and senha='$senha'";
   $query= mysqli_query($conexao, $sql);
   $user= $query->fetch_assoc();
   if(mysqli_num_rows($query) == 0){
     echo"<script> 
     window.alert('Erro !! Email ou senha incorretos !');
     window.location.replace('login.php');
     </script>";
            }else{
            if(!isset ($_SESSION)){
        session_start();
        $_SESSION['email']= $user['email'];
        header('location:tela_tema.html');
    }
}
}


?>