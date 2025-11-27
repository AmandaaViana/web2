<?php
include_once(__DIR__ . "/../../util/Config.php");
?>

<nav class="navbar navbar-expand-md bg-black px-3">

    <a class="navbar-brand" href="<?= URL_BASE ?>">
        <img src="/web2/AtividadeCrud/img/logo.png"
            alt="Logo Pilotos NASCAR"
            width="150" height="40"
            class="d-inline-block">
    </a>

    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#"
                    id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item " href="<?= URL_BASE ?>/view/pilotos/listar.php">Pilotos</a>
                    <a class="dropdown-item " href="#">Equipe</a>
                    <a class="dropdown-item " href="#">Montadora</a>
                    <a class="dropdown-item " href="#">Series</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Sobre</a>
            </li>
        </ul>
    </div>
</nav>
<div class="linha-degrade"></div>