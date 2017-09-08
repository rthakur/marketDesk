<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Company;
use App\Rank;

class ManagecompanyController extends Controller
{
  public function manage()
  {
    if(!Auth::check())
     return redirect('/login');

     $companies = Company::paginate(50);
     return view('dashboard.list', ['companies' => $companies]);
  }
  public function getEditCompany($compayId)
  {
   $data['id'] = $compayId;
   $data['ranks'] = Rank::all();


    return view('company.edit',$data);
  }
  public function postEditCompany(Request $request)
  {

    $company = Company::where('id',$request->id)->first();

    $company->market_cap_type = $request->market_cap_type;
    $company->dividend_yield = $request->dividend_yield;
    $company->research_rank = $request->research_rank;
    $company->rank_id = $request->rank_id;
    $company->book_value = $request->book_value;
    $company->p_e = $request->p_e;


    $company->save();
    return redirect('manage');

  }

}
