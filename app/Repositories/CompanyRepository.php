<?php

namespace App\Repositories;

//use Your Model
use App\Models\Company;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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

  public function update(Object $data){

    if($data->file("logo")){
      $logo = $data->file("logo");

      $file_name = time() . '.' . $logo->getClientOriginalExtension();
      $image = Image::make($logo->getRealPath());

      $image->resize(200, 200, function($cons){
        $cons->aspectRatio();
      });

      $image->stream();

      Storage::disk('local')->put('/public/images/'. $file_name, $image, 'public');
    }

    $company = Company::find(session()->get('companyId'));
    $company->name = $data->name;
    $company->email = $data->email;
    $company->website = $data->website;
    $company->logo = $file_name;

    $company->save();

    return "Something";
  }

  public function destroy($id){
    return "Something";
  }

}
