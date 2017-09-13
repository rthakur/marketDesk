<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Company;
use PHPHtmlParser\Dom;

class DashboardContoller extends Controller
{
    public function index(Request $request)
    {

      if(!Auth::check())
       return redirect('/login');
      $data['industrys'] = Company::groupBy('industry')->pluck('industry');

      $companies = Company::
        where('nse_code','!=','')
        ->where('rsi_60min','!=','0')
        ->where('rsi_60min','!=','')
        ->where('nsc_500', 1);




      if($request->rsi == 'day')
      $companies = $companies->orderBy('rsi', 'asc');
      else
      $companies = $companies->orderBy('rsi_60min', 'asc');

      if($request->industry)
         $companies = $companies->where('industry' ,'=' ,$request->industry);


      if($request->volume)
         $companies = $companies->where('volume' ,'>=' ,$request->volume * 100000);

        if(isset($request->allsearch) && $request->allsearch)
          $companies =  $companies
                        ->where('industry', 'LIKE', "%$request->allsearch%")
                        ->orWhere('name', 'LIKE', "%$request->allsearch%")
                        ->orWhere('nse_code', 'LIKE', "%$request->allsearch%");



      $data['companies'] = $companies->paginate(50);

       return view('dashboard.index',$data);
    }

    public function getdata()
    {
        $base_url ='http://www.marketonmobile.com';
        $page_url =$base_url.'/search.php';
        $get_content = file_get_contents($page_url);
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($get_content);
        $xpath = new \DOMXPath($dom);
        $rowContents = $xpath->query('//div[contains(@class, "table")]//div[contains(@class, "row")] //ul');
        foreach($rowContents as $key =>$rowContent)
        {
          $data['name'] = $rowContents->item($key)->getElementsByTagName('li')->item(0)->textContent;
          $data['nse_symbol'] = $rowContents->item($key)->getElementsByTagName('li')->item(2)->textContent;

          if($key !=0)
          {
            $record = Company::firstOrCreate(array('nse_code'=>$data['nse_symbol']));
            $record->save();
          }

        }
      return back();
    }
}
