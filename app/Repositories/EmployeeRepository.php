<?php

namespace App\Repositories;

//use Your Model
use App\Models\Employee;
use DataTables;
use Auth;


/**
 * Class EmployeeRepository.
 */
class EmployeeRepository
{
  public function all(){
    return Employee::all();
  }

  public function fetch_table(){
    $session_company_id = session()->get('companyId');

    $data = Employee::where('company_id', $session_company_id)->latest()->get();
    return DataTables::of($data)->addIndexColumn()->addColumn('action', function($row){
        $actionBtn = '
          <button type="button" id="view-employee" rel="tooltip" class="btn btn-info btn-icon btn-sm text-white mx-1" data-id="'. $row->id .'" data-original-title="View Employee" title="" data-toggle="modal" data-target="#modal-view-employee">
            <i class="fa fa-eye p-1"></i>
          </button>'
          .
          '<button type="button" id="edit-employee" rel="tooltip" class="btn btn-success btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#modal-edit-employee">
            <i class="fa fa-edit p-1"></i>
          </button>'
          .
          '<button type="button" id="delete-employee" rel="tooltip" class="btn btn-danger btn-icon btn-sm mx-1" data-id="'. $row->id .'" data-original-title="" title="" data-toggle="modal" data-target="#modal-delete-employee">
            <i class="far fa-trash-alt p-1"></i></i>
          </button>'
          ;

          return $actionBtn;
      })->rawColumns(['action'])->make(true);
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
