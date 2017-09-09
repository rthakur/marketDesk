
@extends('layouts.default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Manage</h2>
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
                                   <th>Cap</th>
                                   <th>Action<th>
                               </tr>
                               </thead>
                                   <tr>
                                       <td>
                                         <p>Test</p>
                                       </td>
                                       <td>
                                         Test
                                       </td>
                                       <td><a href="/company/edit/">Edit</a></td>
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
