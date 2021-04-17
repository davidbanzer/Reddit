<?php include_once "src/views/components/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-3">
                <div class="card-header">
                    Formulario de Usuario
                </div>
                <div class="card-body">
                    <form method="post" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <input type="hidden" name="controller" value="usuario"/>
                        <input type="hidden" name="action" value="<?php echo ($id == 0) ? "create" : "saveupdate"; ?>"/>
                        <div class="form-group">
                            <div>
                                <label>Correo:</label>
                            </div>
                            <div>
                                <input type="text" name="correo" class="form-control"
                                       value="<?php echo ($objUsuario == null) ? '' : $objUsuario->getCorreo(); ?>"/>
                            </div>
                        </div class="form-group">
                        <div>
                            <div>
                                <label>Contraseña:</label>
                            </div>
                            <div>
                                <input type="password" name="contra" class="form-control"
                            </div>
                        </div>
                        <div class="mt-3">
                            <input class="btn btn-primary" type="submit" value="Enviar datos"/>
                            <a href="index.php" class="btn btn-link">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

