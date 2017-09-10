
@extends('layouts.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Manage Future Portfolio</h2>
    </div>
    <div class="col-sm-8">
      <br>
      <a href="/portfolio/future/create" class="btn btn-success  pull-right">Add New Stock</a>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row">
           <div class="col-lg-12">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                       <h5>Manage Future Portfolio </h5>
                   </div>
                   <div class="ibox-content">
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>CMP</th>
                                   <th>Entry Price</th>
                                   <th>Target Price</th>
                                   <th>RSI</th>
                                   <th>Volume</th>
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
                                         <td>CMP</td>
                                         <td>{{$portfolio->acp}}</td>
                                         <td>{{$portfolio->target}}</td>
                                         <td>
                                           Hour RSI: {{$portfolio->getCompany->rsi_60min}}<br>
                                           Day RSI: {{$portfolio->getCompany->rsi}}
                                         </td>
                                         <td>
                                          {{ $portfolio->getCompany->volume }}
                                         </td>
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
