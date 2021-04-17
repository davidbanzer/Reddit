<?php include_once "src/views/components/header.php" ?>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <div class="card mt-3">-->
<!--                <div class="card-header">-->
<!--                    Lista de Publicaciones-->
<!--                </div>-->
<!--                <table class="table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>ID</th>-->
<!--                        <th>Titulo</th>-->
<!--                        <th>Descripcion</th>-->
<!--                        <th>Cantidad de Votos</th>-->
<!--                        <th>Comunidad</th>-->
<!--                        <th>Usuario</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php
//                    foreach ($listaPublicacion as $objPublicacion): ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $objPublicacion->getPublicacionId(); ?><!--</td>-->
<!--                            <td>--><?php //echo $objPublicacion->getTitulo(); ?><!--</td>-->
<!--                            <td>--><?php //echo $objPublicacion->getDescripcion(); ?><!--</td>-->
<!--                            <td>--><?php //echo $objPublicacion->getCantidadDeVotos(); ?><!--</td>-->
<!--                            <td>--><?php //echo $objPublicacion->getComunidadId(); ?><!--</td>-->
<!--                            <td>--><?php //echo $objPublicacion->getUsuarioId(); ?><!--</td>-->
<!--                            <td><a class="btn btn-primary"-->
<!--                                   href="index.php?controller=publicacion&action=update&id=--><?php //echo $objPublicacion->getPublicacionId(); ?><!--">Editar</a></td>-->
<!--                            <td><a class="btn btn-danger"-->
<!--                                   onclick="return confirm('¿Está seguro que desea eliminar a la persona?')"-->
<!--                                   href="index.php?controller=publicacion&action=delete&id=--><?php //echo $objPublicacion->getPublicacionId(); ?><!--">Eliminar</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    --><?php //endforeach; ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="container py-3">
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
