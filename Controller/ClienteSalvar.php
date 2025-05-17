<?php
include("../config/db.php");
include("../models/Cliente.php");
include("../DAO/ClienteDAO.php");
$db = new Database();
$conn = $db->connect();
$clienteDAO = new ClienteDAO($conn);
$cliente = new Cliente();
if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $cpf  = $_POST['cpf'];
    $email = $_POST['email'];

    $cliente->nome = $nome;
    $cliente->cpf  = $cpf;
    $cliente->email = $email;
    $clienteDAO->create($cliente);
}
