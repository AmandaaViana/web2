<?php

include_once(__DIR__ . "/view/include/header.php");
include_once(__DIR__ . "/view/include/menu.php");

?>

<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-3">
            <div class="card text-center">
                <img class="card-image-top mx-auto"
                    src="<?= URL_BASE ?>/img/piloto.png"
                    style="max-width: 90%; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Pilotos</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?= URL_BASE ?>/view/pilotos/listar.php" class="card-link">
                            Listagem dos Pilotos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php

    include_once(__DIR__ . "/view/include/footer.php");

    ?>