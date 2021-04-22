<?php use App\models\bll\ComunidadBLL;
use App\models\bll\PublicacionBLL;

include_once "src/views/components/header.php";
$id = 0;
$publicacionBLL = new PublicacionBLL();
$comunidadBLL = new ComunidadBLL();
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
}
$listaPublicaciones = $publicacionBLL->selectAllById($id);
$comunidad = $comunidadBLL->selectById($id);
?>

<div class="container py-3">

    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card-columns d-flex flex-column">
                <h2 class="mb-3">Comunidad : <?php echo $comunidad->getNombre()?></h2>
                <?php
                foreach ($listaPublicaciones as $objPublicacion): ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $objPublicacion->getTitulo() ?></h4>
                            <p class="card-text"><?php echo $objPublicacion->getDescripcion() ?></p>
                            <small>Votos: <?php echo $objPublicacion->getCantidadDeVotos() ?></small> <br>
                            <hr>
                            <small>Posteado por: <?php echo $objPublicacion->getUsuarioForDisplay() ?></small> <br>
                            <small>Comunidad: <?php echo $objPublicacion->getComunidadForDisplay() ?></small> <br>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

