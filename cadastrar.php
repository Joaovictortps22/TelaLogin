<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="Utf-8">
    <title>Projeto Login</title>
    <link rel="Stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="Corpodoformulario">
        <h1 class="titulo"> Cadastrar </h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="email" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
    </div>
    <?php
    //verificar se a pessoa clicou no botão
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmar = addslashes($_POST['confsenha']);
        //verificar se não está vazio algum campo
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
            $u->conectar("login_cadastro", "localhost", "root", "");
            if($u->msgErro == ""){
                if($senha == $confirmarSenha){
                   if($u->cadastrar($nome,$telefone,$email,$senha)){
                        echo "Cadastrado com sucesso, acesse para entrar";
                   }
                   else{
                       echo "Email já cadastrado!";
                   }
                }
                else{
                    echo "Senha e confirmar senha não correspondem!";
                }
            }
            else{
                echo "Erro".$u->msgErro;
            }
        }
        else{
            echo"Preencha todos os campus!";
        }
    }
    ?>
</body>

</html>