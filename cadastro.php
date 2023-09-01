<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    
    <link rel="stylesheet" href="cadastro.css">

</head>
<body>


<form action="" method="post" class="form1">
      
      <h1> Cadastro</h1>

    <div>
       
        <input type="text" name="nome"
        placeholder="Nome:"
         class="nome" required />
    </div>


    <div >
        
        <input type="email" 
        name="email"
        placeholder="E-mail:"
         class="email" required />
    </div>


    <div >
       
       <input type="password" 
       name="senha" placeholder="Senha:" 
       class="senha" required />
    </div>

    <div class="link" > 
        <a href="login.php" > Já é cadastrado? </a>
    </div>

    <div>
        <button type="submit" value="Cadastrar" class="botao2" name="cadastrar" />
    </div>

</form>
</body>
</html>
<?php     

include_once('conexao.php');
$nome= $_POST['nome'];
$email= $_POST['email'];
$senha= $_POST['senha'];

if($nome == ""){
    var_dump($_POST);
}else{
    $sql = "INSERT INTO cadastro(nome,email,senha) VALUES ('$nome','$email','$senha')";
}

$query = mysqli_query($conexao, $sql);
    if($query){   
            echo "<script> 
            alert('Cadastro realizado com sucesso');
            window.location.replace('telatema.html');
            </script>";
    }else{echo("batata");}
?>
