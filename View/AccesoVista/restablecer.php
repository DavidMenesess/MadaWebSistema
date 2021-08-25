<?php
    if(isset($_GET["codigo"])) $codigo = $_GET["codigo"];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Restablecer contraseña</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="../../libraries/fontawesome.js"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ingresa una nueva contraseña</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted"></div>
                                        <form action="../../Controller/AccesoControlador/controladorAcceso.php" method="POST" autocomplete="off" onsubmit="return validarContrasenaRestablecer();"/>
                                            <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
                                            <div class="form-group">
                                                <!--<label class="small mb-1" for="nuevaContrasena">Nueva contraseña</label>-->
                                                <input class="form-control py-4" id="nuevaContrasena" name="nuevaContrasena" placeholder="Nueva contraseña" type="password" minlength="8" maxlength="15" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary text-left" id="guardarNuevaContra" name="guardarNuevaContra">Restablecer contraseña</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Todos los derechos reservados &copy; Mada 2021</div>
                            <div>
                                <a href="#">Políticas de privacidad</a>
                                &middot;
                                <a href="#">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../../libraries/jquery-3.5.1.slim.min.js"></script>
        <script src="../../libraries/bootstrap.bundle.min.js"></script>
        <script src="../../js/scripts.js"></script>
        <script src="../../js/validaciones/validacionesLogin.js"></script>
        <script src="../../libraries/sweetalert2@11.js"></script>
    </body>
</html>
