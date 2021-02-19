<?php

include 'dataBase.php';
$ventaNro = $_POST['ventaNro'];
$fecha = $_POST['fecha'];
$precio = $_POST['precio'];
$medioPago = $_POST['medioPago'];
$prenda = $_POST['prenda'];
$cliente = $_POST['cliente'];
$venta = $_POST['venta'];

if(isset($_POST['guardar'])) {
    Guardar($conn, $ventaNro, $fecha, $precio, $medioPago, $prenda, $cliente);
    $_SESSION['mensaje'] = "Venta guardada!";
    header("Location: ventas.php");
}

if(isset($_POST['verDetalle'])) {
    $row = VerDetalle($conn, $venta);
    $_SESSION['ventaNro'] = $row['ventaNro'];
    $_SESSION['fecha'] = $row['fecha'];
    $_SESSION['precio'] = $row['precio'];
    $_SESSION['medioPago'] = $row['medioPago'];
    $_SESSION['prenda'] = $row['prenda'];
    $_SESSION['cliente'] = $row['cliente'];
    header("Location: ventas.php");
}

if(isset($_POST['borrar'])) {
    Borrar($conn, $venta);
    $_SESSION['mensaje'] = "Venta borrada!";
    header("Location: ventas.php");
}

function Guardar($conn, $ventaNro, $fecha, $precio, $medioPago, $prenda, $cliente) {
    $sql = "SELECT cantidad, costo FROM producto WHERE descripcion = '$prenda'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $nuevaCantidad = ($row['cantidad']) - 1;
    $ganancia = $precio - ($row['costo']);

    $sql = "INSERT INTO venta (ventaNro, fecha, precio, medioPago, prenda, cliente, ganancia) VALUES ('$ventaNro', '$fecha', '$precio', '$medioPago', '$prenda', '$cliente', '$ganancia')";
    $conn->query($sql);

    $sql = "UPDATE producto SET cantidad = '$nuevaCantidad' WHERE descripcion = '$prenda'";
    $conn->query($sql);

    $conn->close();
}

function VerDetalle($conn, $venta){
    $sql = "SELECT * FROM venta WHERE ventaNro = '$venta'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
    return $row;
}

function Borrar($conn, $venta) {
    $sql = "SELECT prenda FROM venta WHERE ventaNro = '$venta'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $articulo = $row['prenda'];

    $sql = "SELECT cantidad FROM producto WHERE descripcion = '$articulo'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $nuevaCantidad = ($row['cantidad']) + 1;

    $sql = "UPDATE producto SET cantidad = '$nuevaCantidad' WHERE descripcion = '$articulo'";
    $conn->query($sql);

    $sql = "DELETE FROM venta WHERE ventaNro = '$venta'";
    $conn->query($sql);

    $conn->close();
}

?>