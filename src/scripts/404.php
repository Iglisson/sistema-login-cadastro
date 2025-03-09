<?php

// verifica se existe erro na sessão
$erro = $_SESSION['error'] ?? null;

unset($_SESSION['error']);

?>

<div class="d-flex mt-5 justify-content-center">
    <h4>Error 404</h4>
    <?php if (!empty($erro)): ?>
        <div class="alert alert-danger mt-3 p-2 text-center">
            <?= $erro ?>
        </div>
    <?php endif; ?>
</div>