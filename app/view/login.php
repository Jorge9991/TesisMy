<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../../static/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../static/img/gestoria.png" type="image/png"/>
    </head>
    <body background="../../static/img/fondologin.png" style="width: 100%;
          background-size: cover;
          background-repeat: no-repeat;
          margin: 0;
          height: 100vh;">
        <div class="container">
            <div class="img">
            </div>
            <div class="login-content">
                <form class="form-signin" id="frmLogin" style="width: 500px;">
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Usuario</h5>
                            <input type="text" id="usuario" name="usuario" class="input" required="true">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i"> 
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Clave</h5>
                            <input type="password" class="input" id="contrasena" name="contrasena" required="true">
                        </div>
                    </div>
                    <label id="_iderror"></label>
                    <button id="btnLogin" class="btn" type="submit">
                        <span id="loading" class="glyphicon glyphicon-log-in"></span>
                        <span id="caption">Iniciar Sesión</span>
                    </button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../../static/js/main.js"></script>
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../../static/js/bootstrap.min.js" type="text/javascript"></script>

        <script>
            $(function () {
                $('#frmLogin').on({
                    submit: function () {
                        $.ajax({
                            url: "loginopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    window.location = data.url;
                                } else {
                                    $('#_iderror').html('credenciales incorrectas');
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus);
                                console.log(jqXHR);
                                alert(errorThrown);
                            }
                        });
                        return false;
                    }
                });
            });
        </script>
    </body>
</html>
