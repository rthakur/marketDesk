
@extends('layouts.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Manage {{ ( Request::segment(2) == 'future')? 'Future' : 'Active' }} Portfolio </h2>
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
                       <h5>Manage {{ ( Request::segment(2) == 'future')? 'Future' : 'Active' }} Portfolio </h5>
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
                                   <th>Current Value</th>
                                   <th>Change</th>
                               </tr>
                               </thead>
                                   <tr>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                      </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
@endsection
