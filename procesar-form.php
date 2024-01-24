<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

   
    echo "Nombre: $nombre<br>";
    echo "Email: $email<br>";
    echo "Teléfono: $telefono<br>";
}
?>
<?php
// Configuración de conexión a la base de datos
$servername = "tu_servidor_mysql";
$username = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el formulario si es un envío POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO formulario_contacto (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulario enviado y datos almacenados en la base de datos con éxito.";
    } else {
        echo "Error al almacenar datos en la base de datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>