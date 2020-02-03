<?php


namespace App\Repositories\Contracts;


use Illuminate\Support\Collection;

interface RepositoryContract
{
    public function getAll() : Collection;

    public function findByField(string $field, $value);
}
