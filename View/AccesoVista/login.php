<?php
require_once('../../Model/conexion.php')
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ingresar - Registrarse</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ingresar</h3></div>
                                    <div class="card-body">
                                        <form action="../../Controller/AccesoControlador/controladorAcceso.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="correoUsuario">Correo</label>
                                                <input class="form-control py-4" id="correoUsuario" name="correoUsuario" type="email" placeholder="Correo electrónico"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="contrasenaUsuario">Contraseña</label>
                                                <input class="form-control py-4" id="contrasenaUsuario" name="contrasenaUsuario" type="password" placeholder="Contraseña"/>
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="recuperarContrasena.php">¿Olvidó su contraseña?</a>
                                                <button type="button" class="btn btn-primary" id="validarAcceso" name="validarAcceso" onclick="validarIngreso();">Ingresar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="registrar.php">¿Necesitas una cuenta? ¡Regístrate!</a></div>
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
        <script src="../../js/validacionesLogin.js"></script>
        <script src="../../libraries/sweetalert2@11.js"></script>
    </body>
</html>
