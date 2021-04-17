<?php
include_once 'src/views/components/header.php'
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-3">
                <div class="card-header">
                    Formulario de Comunidad
                </div>
                <div class="card-body">
                    <form method="post" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <input type="hidden" name="controller" value="comunidad"/>
                        <input type="hidden" name="action" value="<?php echo ($id == 0) ? "create" : "saveupdate"; ?>"/>
                        <div class="form-group">
                            <div>
                                <label>Titulo:</label>
                            </div>
                            <div>
                                <input type="text" name="nombre" class="form-control"
                                       value="<?php echo ($objComunidad == null) ? '' : $objComunidad->getNombre(); ?>"/>
                            </div>
                        </div class="form-group">
                        <div>
                            <div>
                                <label>Usuario:</label>
                            </div>
                            <div>
                                <input type="text" name="usuario_id" class="form-control"
                                       value="<?php echo ($objComunidad == null) ? '' : $objComunidad->getUsuarioId(); ?>"/>
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Enviar datos"/>
                                <a href="index.php" class="btn btn-link">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
