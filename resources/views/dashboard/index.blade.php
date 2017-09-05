
@extends('layouts.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row">
           <div class="col-lg-12">
               <div class="ibox float-e-margins">
                   <div class="ibox-title">
                       <h5>Companies </h5>
                   </div>
                   <div class="ibox-content">
                       <div class="row">
                           <div class="col-sm-4 m-b-xs">
                                 <select class="input-sm form-control input-s-sm inline" name="cap">
                                   <option value="">Market Cap.</option>
                                   <option value="500">greater than 500 cr.</option>
                                   <option value="1000">greater than 1000 cr.</option>
                                   <option value="5000">greater than 5000 cr.</option>
                                   <option value="10000">greater than 10000 cr.</option>
                                   <option value="50000">greater than 50000 cr.</option>
                                </select>
                           </div>
                           <div class="col-sm-4 m-b-xs">
                                 <select class="input-sm form-control input-s-sm inline" name="vol">
                                   <option value="">Volume.</option>
                                   <option value="500">1 million</option>
                                   <option value="1000">greater than 1000 cr.</option>
                                   <option value="5000">greater than 5000 cr.</option>
                                   <option value="10000">greater than 10000 cr.</option>
                                   <option value="50000">greater than 50000 cr.</option>
                                </select>
                           </div>
                           <div class="col-sm-4 m-b-xs">
                                 <select class="input-sm form-control input-s-sm inline" name="vol">
                                   <option value="">RSI</option>
                                   <option value="500">1 million</option>
                                   <option value="1000">greater than 1000 cr.</option>
                                   <option value="5000">greater than 5000 cr.</option>
                                   <option value="10000">greater than 10000 cr.</option>
                                   <option value="50000">greater than 50000 cr.</option>
                                </select>
                           </div>
                       </div>
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>OHLC</th>
                                   <th>Change</th>
                                   <th>Volume</th>
                                   <th>RSI</th>
                               </tr>
                               </thead>
                               <tbody>
                                 @foreach($companies as $company)
                                   <tr>
                                       <td>
                                         <p>{{$company->name}}</p>
                                         <p>
                                         NSE:<b>{{$company->nse_code}}</b>
                                         </p>
                                         <p>Book Value: </p>
                                         <p>H/L 52 Weeks:</p>
                                         <p>Market Cap:</p>
                                       </td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td>{{$company->rsi}}</td>
                                   </tr>
                                 @endforeach
                               </tbody>
                           </table>

                           {{ $companies->links() }}
                       </div>

                   </div>
               </div>
           </div>

       </div>



</div>
@endsection
