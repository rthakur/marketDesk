
@extends('layouts.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Manage Active Portfolio </h2>
    </div>
    <div class="col-sm-8">
      <br>
      <a href="/portfolio/create{{ ( Request::segment(2) == 'future')? '?type=future' : '' }}" class="btn btn-success  pull-right">Add New Stock</a>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row">
           <div class="col-lg-12">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                       <h5>Manage Active Portfolio </h5>
                   </div>
                   <div class="ibox-content">
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Qty</th>
                                   <th>CMP</th>
                                   <th>ACP</th>
                                   <th>Target</th>
                                   <th>RSI</th>
                                   <th>Value</th>
                                   <th>Change</th>
                                   <th></th>
                               </tr>
                               </thead>

                                  @foreach($portfolios as $portfolio)
                                   <tr>
                                        <td>
                                          {{$portfolio->getCompany->name}}
                                          <br>
                                          <b>{{$portfolio->getCompany->nse_code}}</b>
                                        </td>
                                        <td>{{$portfolio->qty}}</td>
                                        <td>CMP</td>
                                        <td>{{$portfolio->acp}}</td>
                                        <td>{{$portfolio->target}}</td>
                                        <td>
                                          Hour RSI: {{$portfolio->getCompany->rsi_60min}}<br>
                                          Day RSI: {{$portfolio->getCompany->rsi}}
                                        </td>
                                        <td>
                                          CMP:
                                          <br>
                                          Value: <b>{{ number_format($portfolio->acp * $portfolio->qty) }}</b>
                                        </td>
                                        <td>{{$portfolio->qty}}</td>
                                        <td><a href="/portfolio/remove/{{$portfolio->id}}">remove</a></td>
                                       </tr>
                                  @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
@endsection
