<nav class="container p-4">
    <div class="row align-items-center">

        <div class="col">
            <h4>Aplicação PHP</h4>
        </div>

        <div class="col text-center">
        </div>

        <div class="col text-end">
            <span><strong><?= $_SESSION['usuario'] -> usuario ?></strong></span>
            <span class="mx-2">|</span>
            <span><a href="?rota=logout">Sair</a></span>
        </div>

    </div>
</nav>