<?php include_once "src/views/components/header.php" ?>

<div class="container py-3">
    <?php if(isset($_SESSION["usuarioLoggeado"])):?>
    <div class="row">
        <div class="col-12">
            <h3>Bienvenido: <?php echo $_SESSION["correoUsuario"];?></h3>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-8">
            <div class="card-columns d-flex flex-column">
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
        <div class="col-4">
            <div>
                <div class="card-columns d-flex flex-column">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Comunidades</h4>
                            <?php
                            foreach ($listaComunidades as $objComunidad): ?>
                                <hr>
                                <h5 class="card-title"><?php echo $objComunidad->getNombre() ?></h5>
                                <p class="card-text">Creado por: <?php echo $objComunidad->getUsuarioForDisplay() ?></p>
                            <?php endforeach; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "src/views/components/header.php" ?>
