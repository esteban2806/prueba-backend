<?php
namespace App\Repositories;

interface NotaRepositoryInterface {
    public function create(array $data);
    public function find($id);
    public function all();
}
