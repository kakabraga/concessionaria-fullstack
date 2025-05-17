<?php

class Cliente
{
    public int $id;
    public string $nome;
    public string $cpf;
    public string $email;
}
//     public function ___construct(string $nome, string $email, string $cpf)
//     {
//         $this->nome = $nome;
//         $this->email = $email;
//         $this->cpf = $cpf;
//     }

    interface ClienteDAOInterface {
        public function buildCliente($data);
        public function create(Cliente $cliente);
        public function update(Cliente $cliente);
        public function delete($id);
        public function listClientes();
    }

