<?php
namespace App\Repositories;

use App\Models\Cliente;

class EloquentClienteRepository implements ClienteRepositoryInterface {
    public function all(array $filters = []) {
        return Cliente::query()->paginate(15);
    }
    public function find(int $id) {
        return Cliente::findOrFail($id);
    }
    public function create(array $data) {
        return Cliente::create($data);
    }
    public function update(int $id, array $data) {
        $c = Cliente::findOrFail($id);
        $c->update($data);
        return $c;
    }
    public function delete(int $id) {
        $c = Cliente::findOrFail($id);
        $c->delete();
        return true;
    }
}
