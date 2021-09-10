<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrarse - Mada</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear mi cuenta</h3></div>
                                    <div class="card-body">
                                        <form action="../../Controller/AccesoControlador/controladorAcceso.php" method="POST" onsubmit="return validarCamposRegistrar();">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control py-4" id="nombre" name="nombre" type="text" placeholder="Nombre" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control py-4" id="apellido" name="apellido" type="text" placeholder="Apellidos" autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control py-4" id="correo" name="correo" type="text" placeholder="Correo electrónico" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control py-4" id="contrasena" name="contrasena" type="password" placeholder="Contraseña" autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block" id="registrarUsuario" name="registrarUsuario">Crear cuenta</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">¿Ya tienes una cuenta? ¡Ingresa!</a></div>
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
