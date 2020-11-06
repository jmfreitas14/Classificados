<?php require 'pages/header.php'; ?>
<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require 'classes/usuarios.php';
    $u = new usuarios();

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $tel = addslashes($_POST['telefone']);

        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($tel)) {
            if ($u->cadastrar($nome, $email, $senha, $tel)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso.<a href="login.php" class="alert alert-link">Faca
                        o login agora</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Usuario ja cadastrado!<a href="login.php" class="alert alert-link">Faca o login agora</a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Cadastrar" class="btn btn-default">
        </div>
    </form>
</div>
<?php require 'pages/footer.php'; ?>
