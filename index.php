<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Asegúrate de definir aquí las funciones auxiliares o incluir las referencias a ellas.
        
        function alerta_error(mensaje) {
            alert(mensaje); // Puedes mejorar esta función para mostrar mensajes de error más estilizados.
        }
        
        function loadinga() {
            console.log('Loading...');
        }
        
        function loadingc() {
            console.log('Loading completed');
        }
        
        function mensaje(msg) {
            alert(msg);
        }
        
        function login() {
            var txtidbanner = $("#txtidbanner").val();
            var txtpassword = encodeURI($("#txtpassword").val());

            if (txtidbanner == "") {
                alerta_error("ID Banner incompleto.");
                $("#txtidbanner").focus();
                return;
            }

            if (txtidbanner.length < 6) {
                alerta_error("ID Banner incompleto.");
                $("#txtidbanner").focus();
                return;
            }
            if (txtpassword == "") {
                alerta_error("Contraseña incompleta.");
                $("#txtpassword").focus();
                return;
            }

            loadinga();
            $.ajax({
                type: "POST",
                url: "Default.aspx/Login",
                data: JSON.stringify({txtidbanner: txtidbanner, txtpassword: txtpassword}),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                processData: false,
                success: function (response) {
                    // Aquí manejas la respuesta del servidor.
                    loadingc();
                    console.log(response);
                    mensaje('Login exitoso');
                },
                error: function (result) {
                    loadingc();
                    mensaje("Intentelo mas tarde");
                }
            });
        }
    </script>
</head>
<body>

<form onsubmit="event.preventDefault(); login();">
    <label for="txtidbanner">ID Banner:</label>
    <input type="text" id="txtidbanner" name="txtidbanner"><br><br>
    
    <label for="txtpassword">Contraseña:</label>
    <input type="password" id="txtpassword" name="txtpassword"><br><br>
    
    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>
