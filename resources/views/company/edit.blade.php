

@extends('layouts.default')
@section('content')

<div class="container">
 <div class="row">
  <div class="col-sm-6 col-sm-offset-2">
        <h2>Assign Cap To Company</h2>
        <form class="form-horizontal" method="post" action="/company/edit">

           {{ csrf_field() }}

         <input type="hidden" name="id" value="{{$id}}">

          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Cap:</label>
            <div class="col-sm-9" >
              <select  class="form-control" name="market_cap_type">
                <option value="small">small</option>
                <option value="large">large</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" >Dividend yield:</label>
            <div class="col-sm-9" >
              <input type="number"  class="form-control" name="dividend_yield" step=any>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Research Rank:</label>
            <div class="col-sm-9" >
              <select  class="form-control" name="research_rank">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Rank:</label>
            <div class="col-sm-9" >
              <select  class="form-control" name="rank_id">
                @foreach($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Book Value:</label>
            <div class="col-sm-9" >
              <input type="number"  class="form-control" name="book_value">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">  P E:</label>
            <div class="col-sm-9" >
              <input type="number"  class="form-control" name="p_e" step=any>
            </div>

          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
  </div>
 </div>
</div>

@endsection
