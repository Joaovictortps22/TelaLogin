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
#       sucesso{
            width: 420px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(140,100,112,.3);
            color: green;
            margin: 90px auto 0px 85px;
            font-size: Impact;
            text-align: center;
        }
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
        <h1 class="titulo"> Cadastrar </h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30" required autocomplete="off">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30" required autocomplete="off">
            <input type="email" name="email" placeholder="email" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15" required autocomplete="off">
            <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15" required autocomplete="off">
            <input type="submit" value="Cadastrar">
    </div>
    <?php
    //verificar se a pessoa clicou no botão
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confsenha']);
        //verificar se não está vazio algum campo
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
            $u->conectar("login_cadastro", "localhost", "root", "");
            if($u->msgErro == ""){
                if($senha == $confirmarSenha){
                   if($u->cadastrar($nome,$telefone,$email,$senha)){
                       ?>
                       <div id="sucesso">
                        Cadastrado com sucesso, acesse para entrar
                       </div>
                        <?php
                   }
                   else{
                       ?>
                       <div class="erro">
                       Email já cadastrado!
                       </div>
                        <?php
                   }
                }
                else{
                    ?>
                    <div class="erro">
                    Senha e confirmar senha não correspondem!
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