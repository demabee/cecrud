<?php

namespace App\Repositories;

//use Your Model
use App\Models\Company;
use App\Models\Employee;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPassword;
use Illuminate\Support\Str;
use StoreImage;
use StoreCompany;
use StoreEmployee;
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

  public function get($id){
    $company = Company::find($id);
    return $company;
  }

  public function store(Object $data){

    if($data->file("logo")){
      $file_name = StoreImage::store_image($data->file("logo"));
    }

    $company_id = StoreCompany::store_company($data, $file_name);

    $password = Str::random(8);

    StoreEmployee::store_employee($data, $company_id, $password);
    
    $details = [
      'first_name' => "Admin",
      'last_name' => "Account",
      'email' => $data->emp_email,
      'password' => $password,
    ];

    return $this->mail($details);
  }

  public function mail(array $data){
    Mail::to($data['email'])->send(new MailPassword($data));

    $message = " successfully added ". $data['first_name'] ." ". $data['last_name'] .". An email will be sent to his account for his credentials. Thank you!";

    return $message;
  }

  public function update(Object $data){

    if($data->file("logo")){
      $file_name = StoreImage::store_image($data->file("logo"));
    }

    $company = $this->get(session()->get('companyId'));
    $company->name = $data->name;
    $company->email = $data->email;
    $company->website = $data->website;
    $company->logo = $file_name;

    $company->save();
  }

  public function destroy($id){
    return "Something";
  }

}
