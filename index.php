/* Instanciar a classe */
<?php
require_once 'usuarios.php';
$u = new Usuario;
?>


<html lang="pt-br">
<head>
    <meta charset="Utf-8">
    <title>Projeto Login</title> 
    <link rel="Stylesheet" href="estilo.css">

    <style>
        .erro{
            width: 420px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(140,100,112,.3);
            color: #72c6f7;
            margin: 90px auto 0px 85px;
            font-size: Impact;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="Corpodoformulario">
        <h1 class="titulo"> Entrar </h1>
        <form method="POST">
        <input type="email" name="email" placeholder="Usuário" required autocomplete="off">
        <input type="password" name="senha" placeholder="Senha" required autocomplete="off">
        <input type="submit" value="Acessar">
        <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong>
    </div>
    <?php
    if(isset($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        //verificar se não está vazio algum campo
        if(!empty($email) && !empty($senha)){
            $u->conectar("login_cadastro", "localhost", "root", "");
                if($u->msgErro == ""){
                    if($u->logar($email,$senha)){
                        header("location: areaPrivada.php");
                    }
                    else{
                        ?>
                        <div class="erro">
                            Email e/ou senha estão incorretos!
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <div class="erro">
                       <?php echo "Erro: ".$u->msgErro; ?>
                    </div>
                    <?php
                }
            
        }
        else{
            ?>
            <div class="erro">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
</body>

</html>