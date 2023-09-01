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
       
        <input type="text" name="palavra"
        placeholder="Palavra:"
         class="nome" required />
    </div>


    <div >
        
        <input type="text" 
        name="tipo"
        placeholder="Tipo:"
         class="email" required />
    </div>


    <div >
       
       <input type="text" 
       name="dica" placeholder="Dica:" 
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
$palavra= $_POST['palavra'];
$tipo= $_POST['tipo'];
$dica= $_POST['dica'];

if($palavra == ""){
    var_dump($_POST);
}else{
    $sql = "INSERT INTO palavras(palavra,tipo,dica) VALUES ('$palavra','$tipo','$dica')";
}

$query = mysqli_query($conexao, $sql);
    if($query){   
            // echo "<script> 
            // alert('Cadastro realizado com sucesso');
            // window.location.replace('telatema.html');
            // </script>";
    }else{echo("batata");}
?>
