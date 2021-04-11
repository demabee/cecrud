<?php
namespace App\Repositories;

interface CrudInterface {
  public function all();
  public function get($id);
  public function fetch_table();
  public function store(Object $data);
  public function mail(array $data);
  public function update(Object $data);
  public function destroy($id);
}