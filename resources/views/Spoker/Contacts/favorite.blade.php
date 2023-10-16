@extends('Spoker.template.base')

@section('title', 'Spoker - All Favorite Contact')

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
                      <h4 class="card-title">All Favorite Contacts</h4>
                    </div>
                    <div class="col-lg-7 col-md-7 col-7">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>
                  <br>
                  <form class="form-sample" action="{{url('/favorite-contacts')}}" method="get">
                    @csrf
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label" style="padding-top: 1px;">Type</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="contact_type" id="contact_type" required>
                              <option value="">- Select Type -</option>
                              <option value="%" @if(Request()->contact_type=='%'){{'selected'}}@endif>All</option>
                              @foreach($contact_type as $contact_types)
                                <option value="{{$contact_types->contact_type}}" @if(Request()->contact_type==$contact_types->contact_type){{'selected'}}@endif>{{$contact_types->contact_type}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label" style="padding-top: 1px;text-align: right;">Source</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="source" id="source" required>
                              <option value="">- Select Source -</option>
                              <option value="%" @if(Request()->source=='%'){{'selected'}}@endif>All</option>
                              @foreach($source as $sources)
                                <option value="{{$sources->source}}" @if(Request()->source == $sources->source){{'selected'}}@endif>{{$sources->source}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary me-2" style="padding:8px;" name="search">Search</button>
                        <a href="{{url('/favorite-contacts')}}" class="btn btn-warning" style="padding:8px;">Reset</a>
                      </div>
                  </form>
                  <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                      <thead>
                        <tr>
                          <th>Sr No.</th>
                          <th>Spoker Name</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Location</th>
                          <th>Contact Type</th>
                          <th>Source</th>
                          <th>Website</th>
                          <th>Additional Info</th>
                          <th>Follow Up</th>
                          <th>Follow Up Date</th>
                          <th>Favorite Status</th>
                          <th>Type</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php($key=0)
                        @foreach($data as $datas)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{@getSpokerName($datas->spoker_id)}}</td>
                            <td>{{@$datas->name}}</td>
                            <td>{{@$datas->mobile}}</td>
                            <td>{{@$datas->email}}</td>
                            <td><span title="{{$datas->location}}" style="cursor: pointer;">{{ substr($datas->location, 0,  35) }} @if(strlen($datas->location)>35) .... @endif</span></td>
                            <td><span title="{{$datas->contact_type}}" style="cursor: pointer;">{{ substr($datas->contact_type, 0,  30) }} @if(strlen($datas->contact_type)>30) .... @endif</span></td>
                            <td><span title="{{$datas->source}}" style="cursor: pointer;">{{ substr($datas->source, 0,  30) }} @if(strlen($datas->source)>30) .... @endif</span></td>
                            <td><span title="{{$datas->website}}" style="cursor: pointer;">{{ substr($datas->website, 0,  30) }} @if(strlen($datas->website)>30) .... @endif</span></td>
                            <td><span title="{{$datas->additional_info}}" style="cursor: pointer;">{{ substr($datas->additional_info, 0,  30) }} @if(strlen($datas->additional_info)>30) .... @endif</span></td>
                            <td>{{@$datas->follow_up}}</td>
                            <td>{{date('d-m-Y', strtotime($datas->follow_up_date))}}</td>
                            <td>{{@$datas->favorite_status}}</td>
                            <td>{{@$datas->type}}</td>
                            <td>{{@$datas->status}}</td>
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