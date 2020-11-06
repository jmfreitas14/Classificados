<?php require 'pages/header.php'; ?>
<div class="container">
    <h1>Login</h1>
    <?php
    require 'classes/usuarios.php';
    $u = new usuarios();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if ($u->login($email, $senha)) {
            ?>
            <script type="text/javascript">window.location.href = "./";</script>
        <?php
        }else{
        ?>
            <div class="alert alert-danger">
                Usuario e/ou senha incorretos!<a href="cadastre.php" class="alert alert-link">Cadastre-se</a>
            </div>
            <?php
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-default">
        </div>
    </form>
</div>
<?php require 'pages/footer.php'; ?>
