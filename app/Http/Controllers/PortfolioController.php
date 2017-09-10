<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;
use Auth;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Request::segment(2) == 'future')
        {
          $portfolio = Portfolio::where('type',1)->where('user_id', Auth::id())->get();
          return view('portfolio.future', ['portfolios' => $portfolio]);
        }

        $portfolio = Portfolio::where('type',0)->where('user_id', Auth::id())->get();
        return view('portfolio.index', ['portfolios' => $portfolio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('portfolio.form');
    }


    public function futureCreate()
    {
      return view('portfolio.future_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $p = new Portfolio;
      $p->user_id = Auth::id();
      $p->acp = $request->acp;
      $p->qty = $request->qty;
      $p->target = $request->target;
      $p->book_loss = $request->exit;
      $p->company_id = $request->company_id;
      $p->save();

      return redirect('portfolio');
    }


    public function futureStore(Request $request)
    {

      $p = new Portfolio;
      $p->user_id = Auth::id();
      $p->target = $request->target;
      $p->type = 1;
      $p->company_id = $request->company_id;
      $p->acp = $request->acp;
      $p->save();

      return redirect('portfolio/future');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfolio::where('id', $id)->where('user_id', Auth::id())->delete();
        return back();
    }
}
