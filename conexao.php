<!-- Página de conexão com o banco de dados -->

<?php
$servidor ='localhost';
$user = 'Ellie';
$senha = '12345678';
$database = 'jacksave';

$conexao = mysqli_connect($servidor, $user, $senha, $database);
?>