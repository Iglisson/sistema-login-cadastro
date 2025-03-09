<?php

// verifica se existe erro na sessão
$erro = $_SESSION['error'] ?? null;

unset($_SESSION['error']);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card bg-light p-5 shadow-mt-5">

                <h3>Login</h3>
                <hr>

                <form action="?rota=login-submit" method="post">

                    <div class="mb-3">
                        <label for="text-usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" name="text-usuario" id="text-usuario" autocomplete="off" placeholder="Digite o nome de usuário" required>
                    </div>

                    <div class="mb-3">
                        <label for="text-senha" class="form-label">Senha</label>
                        <input type="password" name="text-senha" id="text-senha" class="form-control" placeholder="Digite a senha" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="Entrar">
                    </div>

                </form>

                <div>
                    <a href="?rota=signin" class="btn btn-outline-primary w-100">Cadastrar</a>
                </div>

                <?php if(!empty($erro)): ?>
                    <div class="alert alert-danger mt-3 p-2 text-center">
                        <?= $erro ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>