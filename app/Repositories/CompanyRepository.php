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

  public function fetch_table(){
    return "Something";
  }

  public function store(Object $data){
    return "Something";
  }

  public function mail(array $data){
    return "Something";
  }

  public function update(array $data){
    return "Something";
  }

  public function destroy($id){
    return "Something";
  }

}
