<?php
$nombre=$_POST['nombre'];
$mail=$_POST['mail'];
$mensaje=$_POST['mensaje'];

$destinatario="daidaros08@gmail.com";
$asunto="consulta";

$carta="de:$nombre\n";
$carta.="con el mail:  $mail\n";
$carta.=" $mensaje\n";

mail($destinatario, $asunto, $carta);
header('Location:curriculum.html'); //location: donde redirige luego de enviar el form, en este caso el archivo curriculum.html
//buscar que hace header

$servidor = "localhost";
$database = "cv"; //debe coincidir con el nombre de la base de datos del Xampp
$username = "root";
$password = "";

$conn = mysqli_connect($servidor, $username, $password, $database);
if (!$conn) { //buscar que es die
      die("Connection failed: " . mysqli_connect_error());
} //si falla envia el mensaje conection failed con el error
 
echo "Connected successfully";
 
$sql = "INSERT INTO respform (nombre, mail, mensaje) VALUES ('$nombre', '$mail', '$mensaje')"; //inserta en los elementos de la tabla(nombre, mail, mensaje) los valores de las variables $nombre, etc
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
    ?>

