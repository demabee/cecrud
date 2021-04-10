<?php
namespace App\Repositories;

interface CrudInterface {
  public function all();
  public function authenticate_employee(array $data);
  public function get($id);
  public function store(array $data);
  public function update(array $data);
  public function delete($id);
}