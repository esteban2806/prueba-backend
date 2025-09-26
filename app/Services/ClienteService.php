<?php

namespace App\Services;

use App\Repositories\ClienteRepository;

class ClienteService
{
    protected $repo;

    public function __construct(ClienteRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listarClientes()
    {
        return $this->repo->all();
    }

    public function verCliente($id)
    {
        return $this->repo->find($id);
    }

    public function crearCliente($data)
    {
        return $this->repo->create($data);
    }

    public function actualizarCliente($id, $data)
    {
        return $this->repo->update($id, $data);
    }

    public function eliminarCliente($id)
    {
        return $this->repo->delete($id);
    }
}
