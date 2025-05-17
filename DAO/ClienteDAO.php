<?php
require_once("../models/Cliente.php");
class ClienteDAO implements ClienteDAOInterface
{

    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    public function buildCliente($data)
    {
        $cliente = new Cliente();

        $cliente->id         = $data["id"];
        $cliente->nome       = $data["nome"];
        $cliente->email      = $data["email"];
        $cliente->cpf        = $data["cpf"];

        return $cliente;
    }
    public function create(Cliente $cliente)
    {
        $stmt = $this->conn->prepare("INSERT INTO tb_cliente (nome, cpf, email) VALUES (:nome, :cpf, :email)");
        $stmt->bindParam(":nome", $cliente->nome);
        $stmt->bindParam(":cpf", $cliente->cpf);
        $stmt->bindParam(":email", $cliente->email);
        $stmt->execute();
    }
    public function update(Cliente $cliente)
    {
        $stmt = $this->conn->prepare(
 "UPDATE tb_cliente 
         SET nome = :nome, cpf = :cpf, email = :email 
         WHERE id_cliente = :id"
        );
        $stmt->bindParam(":nome", $cliente->nome);
        $stmt->bindParam(":cpf", $cliente->cpf);
        $stmt->bindParam(":email", $cliente->email);
        $stmt->bindParam(":id", $cliente->id);
        $stmt->execute();
    }
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM tb_cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function listClientes()
    {
        $stmt  = $this->conn->prepare("SELECT nome, cpf, email FROM tb_cliente");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $clientes = [];
        foreach ($result as $row) {
            $clientes[] = $this->buildCliente($row);
        }
            return $clientes;
    }
}
