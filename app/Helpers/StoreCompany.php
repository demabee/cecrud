<?php

namespace App\Helpers;

use App\Models\Company;

class StoreCompany {
  public static function store_company($data, $logo){
    $company = new Company;
    $company->name = $data->name;
    $company->email = $data->email;
    $company->website = $data->website;
    $company->logo = $logo;

    $company->save();

    return $company->id;
  }
}