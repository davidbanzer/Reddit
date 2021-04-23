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
                            <?php if (isset($_SESSION["usuarioLoggeado"]) && $_SESSION["idUsuario"] == $objPublicacion->getUsuarioId()): ?>
                            <smal class="float-right m-2"><a onclick="return confirm('¿Está seguro que desea eliminar a la persona?')" href="index.php?controller=publicacion&action=delete&id=<?php echo $objPublicacion->getPublicacionId()?>"><i class="far fa-trash"></i></a></smal>
                            <smal class="float-right m-2"><a  href="index.php?controller=publicacion&action=update&id=<?php echo $objPublicacion->getPublicacionId()?>"><i class="fal fa-edit"></i></a></smal>
                            <?php endif;?>
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
                                <h5 class="card-title"><a class="text-dark" href="index.php?controller=comunidad&action=list&id=<?php echo $objComunidad->getComunidadId();?>"><?php echo $objComunidad->getNombre() ?></a></h5>
                                <p class="card-text">Creado por: <?php echo $objComunidad->getUsuarioForDisplay() ?></p>
                                <?php if (isset($_SESSION["usuarioLoggeado"]) && $_SESSION["idUsuario"] == $objComunidad->getUsuarioId()): ?>
                                    <smal class="m-2"><a onclick="return confirm('¿Está seguro que desea eliminar a la persona?')" href="index.php?controller=comunidad&action=delete&id=<?php echo $objComunidad->getComunidadId()?>"><i class="far fa-trash"></i></a></smal>
                                    <smal class="m-2"><a  href="index.php?controller=comunidad&action=update&id=<?php echo $objComunidad->getComunidadId()?>"><i class="fal fa-edit"></i></a></smal>
                                <?php endif;?>
                            <?php endforeach; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

