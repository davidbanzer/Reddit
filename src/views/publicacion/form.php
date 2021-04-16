<?php include_once "src/views/components/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-3">
                <div class="card-header">
                    Formulario de Publicación
                </div>
                <div class="card-body">
                    <form method="post" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <input type="hidden" name="controller" value="publicacion"/>
                        <input type="hidden" name="action" value="<?php echo ($id == 0) ? "create" : "saveupdate"; ?>"/>
                        <div class="form-group">
                            <div>
                                <label>Titulo:</label>
                            </div>
                            <div>
                                <input type="text" name="titulo" class="form-control"
                                       value="<?php echo ($objPublicacion == null) ? '' : $objPublicacion->getTitulo(); ?>"/>
                            </div>
                        </div class="form-group">
                        <div>
                            <div>
                                <label>Descripción:</label>
                            </div>
                            <div>
                                <input type="text" name="descripcion" class="form-control"
                                       value="<?php echo ($objPublicacion == null) ? '' : $objPublicacion->getDescripcion(); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Cantidad de Votos:</label>
                            </div>
                            <div>
                                <input type="text" name="cantidad_de_votos" class="form-control"
                                       value="<?php echo ($objPublicacion == null) ? '' : $objPublicacion->getCantidadDeVotos(); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Comunidad:</label>
                            </div>
                            <div>
                                <input type="text" name="comunidad_id" class="form-control"
                                       value="<?php echo ($objPublicacion == null) ? '' : $objPublicacion->getComunidadId(); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Usuario:</label>
                            </div>
                            <div>
                                <input type="text" name="usuario_id" class="form-control"
                                       value="<?php echo ($objPublicacion == null) ? '' : $objPublicacion->getUsuarioId(); ?>"/>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" value="Enviar datos"/>
                            <a href="index.php" class="btn btn-link">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

