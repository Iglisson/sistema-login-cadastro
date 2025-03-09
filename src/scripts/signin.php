<?php 

// Verifica se existe erro na sessão
$erro = $_SESSION['error'] ?? null;

unset($_SESSION['error']);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card bg-light p-5 shadow-mt-5">
                <h3>Cadastro</h3>
                <hr>

                <form action="?rota=signin-submit" method="post">
                    <div class="mb-3">
                        <label for="text-usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Digite o nome de usuário" id="text-usuario" name="text-usuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="text-senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" autocomplete="off"
                        placeholder="Digite a senha" id="text-senha" name="text-senha" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" autocomplete="off" placeholder="Digite a senha novamente" name="text-senha-repetida" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="Cadastrar">
                    </div>
                </form>

                <div class="mb-3">
                    <a class="btn btn-outline-primary w-100" href="?rota=login">Login</a>
                </div>

                <?php if(!empty($erro)): ?>
                    <div class="alert alert-danger p-2 text-center">
                        <?= $erro ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>