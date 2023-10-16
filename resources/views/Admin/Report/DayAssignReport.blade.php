@extends('Admin.template.base')

@section('title', 'Admin - Day/Spoker Report')

@section('styles')
@endsection

@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-5">
                        <h4 class="card-title">Day/Spoker Report</h4>
                    </div>
                    <div class="col-lg-7 col-md-7 col-7">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>

                  <br>
                  <form class="form-sample" id="form-sample" metho="get" action="{{url('/admin/day-spoker-report')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="padding-top: 1px;text-align: right;">From Date</label>
                                <div class="col-sm-8">
                                   <input type="date" class="form-control" name="from_date" id="from_date" @if(Request::get('from_date')) value="{{Request::get('from_date')}}" @else  value="{{date('Y-m-01')}}" @endif onchange="jQuery('#to_date').val(this.value).attr('min', this.value);" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="padding-top: 1px;text-align: right;">To Date</label>
                                <div class="col-sm-8">
                                   <input type="date" class="form-control" name="to_date" id="to_date" @if(Request::get('to_date')) value="{{Request::get('to_date')}}" min="{{Request::get('from_date')}}" @else  value="{{date('Y-m-t')}}" min="{{date('Y-m-01')}}" @endif required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group row" style="padding-left:15px;">
                                <label class="col-sm-4 col-form-label" style="padding-top: 1px;text-align: right;">Spokers</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="spoker_id" id="spoker_id">
                                    <option value="%">All</option>
                                    @foreach($spoker as $spokers)
                                        <option value="{{$spokers->id}}" @if(Request()->spoker_id == $spokers->id){{'selected'}}@endif>{{$spokers->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="padding:0px;">
                            <button type="submit" class="btn btn-primary me-2" style="padding:8px;" name="search" onclick="jQuery('#spoker_id').attr('required', false)">Search</button>
                            <a href="{{url('/admin/day-spoker-report')}}" class="btn btn-warning" style="padding:8px;">Reset</a>
                        </div>
                    </form>
                  <!-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <!-- <table class="table table-hover" id="datatablesSimple"> -->
                    <table class="table table-hover" id="">
                      <thead>
                        <tr>
                          <th>Sr No.</th>
                          <th>Spoker</th>
                          <th>No. Of Assign Contacts</th>
                          <th>No. Of Follow Up Contacts</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php($key=0)
                        @foreach($data as $datas)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{@getSpokerName($datas->spoker_id)}} ({{$datas->spoker_id}})</td>
                            <td>{{@getNoOfAssignContact($datas->spoker_id, Request::get('from_date'), Request::get('to_date'))}}</td>
                            <td>{{@getNoOfFolUpContact($datas->spoker_id, Request::get('from_date'), Request::get('to_date'))}}</td>
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
@section('scripts')
  <script src="{{url('assets/admin/js/custum/hideMsg.js')}}"></script>
@endsection