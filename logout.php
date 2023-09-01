<!-- Página para o usuário sair da sessão/conta dele -->

<?php

//recupera o usuário 

if(!isset($_SESSION)){
    session_start();

    session_destroy();
    header('location:login.php');
}


?>