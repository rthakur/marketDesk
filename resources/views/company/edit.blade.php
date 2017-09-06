

@extends('layouts.default')
@section('content')

<div class="container">
 <div class="row">
  <div class="col-sm-8 col-sm-offset-2">
        <h2>Assign Cap To Company</h2>
        <form class="form-horizontal" method="post" action="/company/edit">

           {{ csrf_field() }}

         <input type="hidden" name="id" value="{{$id}}">

          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Cap:</label>
            <div class="col-sm-10" >
              <select  class="form-control" name="market_cap_type">
                <option value="small">small</option>
                <option value="large">large</option>
              </select>


            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
  </div>
 </div>
</div>

@endsection
