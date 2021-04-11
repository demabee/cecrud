<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateCompany;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{

  protected $company;

  public function __construct(CompanyRepository $company){
    $this->company = $company;
  }

  function fetch_data(Request $request){
    if($request->ajax()){
      $companies = $this->company->all();

      return response()->json($companies);
    }
  }

  function update_company(UpdateCompany $request){
    $this->company->update($request);
    return redirect('/company')->with('message', 'Successfully Updated the Companies information.');
  }
}
