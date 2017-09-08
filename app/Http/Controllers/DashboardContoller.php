<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Company;
use PHPHtmlParser\Dom;

class DashboardContoller extends Controller
{
    public function index()
    {
      if(!Auth::check())
       return redirect('/login');

       $companies = Company::
			 where('nse_code','!=','')
		   ->where('rsi_60min','!=','0')
		   ->where('rsi_60min','!=','')
		   ->orderBy('rsi_60min', 'asc')
		   ->paginate(50);
       return view('dashboard.index', ['companies' => $companies]);
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
            $record = Company::firstOrCreate(array('name' =>$data['name'],'nse_code'=>$data['nse_symbol']));
            $record->save();
          }

        }
      return back();
    }



}
