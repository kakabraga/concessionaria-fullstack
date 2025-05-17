<?php
include("../config/db.php");
include("../models/Cliente.php");
include("../DAO/ClienteDAO.php");
$db = new Database();
$conn = $db->connect();
$clienteDAO = new ClienteDAO($conn);
$cliente = new Cliente();
if (isset($_POST['enviar'])) {
    $id =  $_POST['id_cliente'];
    $clienteDAO->delete($id);
}
