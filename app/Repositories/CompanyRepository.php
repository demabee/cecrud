<?php

namespace App\Repositories;

//use Your Model
use App\Models\Company;

/**
 * Class EmployeeRepository.
 */
class CompanyRepository implements CrudInterface
{
  public function all(){
    return Company::all();
  }

  public function get($id){
    return "Something";
  }

  public function authenticate_employee(array $data){
    return "Something";
  }

  public function store(array $data){
    return "Something";
  }

  public function update(array $data){
    return "Something";
  }

  public function delete($id){
    return "Something";
  }

}
