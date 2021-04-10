<?php
namespace App\Repositories;

interface CrudInterface {
  public function all();
  public function fetch_table();
  public function store(array $data);
  public function update(array $data);
  public function destroy($id);
}