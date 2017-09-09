@extends('layouts.default')
@section('content')
<div class="container">
 <div class="row">
  <div class="col-sm-6 col-sm-offset-2">
        <h2><center>Add Portfolio</center></h2>
        <form class="form-horizontal" method="post" action="/portfolio/future/store">
           {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Select Stock:</label>
            <div class="col-sm-9" >
              <select  class="form-control" name="company_id">
                @foreach(App\Company::get() as $company)
                  <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Target Price:</label>
            <div class="col-sm-9" >
              <input type="number"  class="form-control" name="target" step=any required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </form>
  </div>
 </div>
</div>

@endsection
