<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
