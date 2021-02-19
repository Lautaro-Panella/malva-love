<?php

include 'dataBase.php';
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$costo = $_POST['costo'];
$categoria = $_POST['categoria'];
$username = $_POST['username'];
$password = $_POST['password'];
$prenda = $_POST['prenda'];

if(isset($_POST['ingresar'])) {
    Ingresar($username, $password);
}

if(isset($_POST['guardar'])) {
    Guardar($conn, $codigo, $descripcion, $cantidad, $costo, $categoria);
    $_SESSION['mensaje'] = "Prenda guardada!";
    header("Location: stock.php");
}

if(isset($_POST['verDetalle'])) {
    $row = VerDetalle($conn, $prenda);
    $_SESSION['codigo'] = $row['codigo'];
    $_SESSION['descripcion'] = $row['descripcion'];
    $_SESSION['cantidad'] = $row['cantidad'];
    $_SESSION['costo'] = $row['costo'];
    $_SESSION['categoria'] = $row['categoria'];
    header("Location: stock.php");
}

if(isset($_POST['borrar'])) {
    Borrar($conn, $prenda);
    $_SESSION['mensaje'] = "Prenda borrada!";
    header("Location: stock.php");
}

function Ingresar($username, $password){
    $adminUser = "ropanella";
    $adminPass = "1234";
    if($username == $adminUser && $password == $adminPass){
        $_SESSION['mensaje'] = "Bienvenida!";
        header("Location: stock.php");
    }
    else {
        $_SESSION['mensaje'] = "Datos incorrectos!";
        header("Location: login.php");
    }
}

function Guardar($conn, $codigo, $descripcion, $cantidad, $costo, $categoria) {
    $sql = "INSERT INTO producto (codigo, descripcion, cantidad, costo, categoria) VALUES ('$codigo', '$descripcion', '$cantidad', '$costo', '$categoria')";
    $conn->query($sql);
    $conn->close();
}

function VerDetalle($conn, $prenda){
    $sql = "SELECT * FROM producto WHERE codigo = '$prenda'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
    return $row;
}

function Borrar($conn, $prenda) {
    $sql = "DELETE FROM producto WHERE codigo = '$prenda'";
    $conn->query($sql);
    $conn->close();
}

?>