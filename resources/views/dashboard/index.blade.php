
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
                        <form method="get" action="/">
                          @if(count($industrys) > 1)
                           <div class="col-sm-4 m-b-xs">
                                 <select class="input-sm form-control input-s-sm inline" name="industry">
                                   <option value="">Select Industry</option>
                                     @foreach($industrys as $industry)
                                      <option value="{{$industry}}" {{ (isset($_GET['industry']) && $_GET['industry'] == $industry )? 'selected' : ''}}>{{$industry}}</option>
                                    @endforeach
                                </select>
                           </div>
                           @endif
                           <div class="col-sm-4 m-b-xs">
                                 <select class="input-sm form-control input-s-sm inline" name="volume">
                                   <option value="">Select Volume</option>
                                   @foreach([1,5,10,15,20,30,40,50,60,70,80 ] as $vol)
                                      <option value="{{$vol}}" {{ (isset($_GET['volume']) && $_GET['volume'] == $vol )? 'selected' : ''}}>greater than {{$vol}} lakh  </option>
                                   @endforeach
                                  </select>
                           </div>
                           <button type="submit"  class="btn btn-primary"> Search</button>
                         </form>
                       </div>
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>OHLC</th>
                                   <th>Change</th>
                                   <th>Volume</th>
                                   <th>RSI 1h</th>
                                   <th>RSI Day</th>
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
                                         <p> Industry:</p>
                                       </td>
                                       <td>
                                          Open: {{$company->open}}<br><br>
                                          Close: {{$company->close}}<br><br>
                                          High: {{$company->high}}<br><br>
                                          Low: {{$company->low}}<br><br>
                                           {{$company->industry}}<br><br>
                                       </td>
                                       <td>{{$company->change}}</td>
                                       <td>{{ number_format($company->volume) }}</td>
                                       <td>{{$company->rsi_60min}}</td>
                                       <td>{{$company->rsi}}</td>
                                   </tr>
                                 @endforeach
                               </tbody>
                           </table>
                           {!! $companies->appends(Request::capture()->except('page'))->render() !!}
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
@endsection
