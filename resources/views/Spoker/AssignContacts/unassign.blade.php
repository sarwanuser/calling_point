@extends('Admin.template.base')

@section('title', 'Admin - All Assign Contact')

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
                      <a href="{{url('/admin/assign-contacts')}}" class="btn btn-success" style="padding: 10px;">Assigned Contact - <span>{{$count_assign}}</span></a>
                      <a href="{{url('/admin/unassign-contacts')}}" class="btn btn-success" style="border-bottom: 5px solid #ff4081;padding: 8px;">Unassigned Contact - <span>{{$count_unassign}}</span></a>
                    </div>
                    <div class="col-lg-7 col-md-7 col-7">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>

                  <br>
                  <form class="form-sample" metho="get" action="{{url('/admin/unassign-contacts')}}">
                    @csrf
                    <div class="row">
                      <div class="col-md-3">
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

                      <div class="col-md-3">
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
                      
                      <div class="col-md-2" style="padding:0px;">
                        <button type="submit" class="btn btn-primary me-2" style="padding:8px;" name="search" onclick="jQuery('#spoker_id').attr('required', false)">Search</button>
                        <a href="{{url('/admin/unassign-contacts')}}" class="btn btn-warning" style="padding:8px;">Reset</a>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group row" style="padding-left:15px;">
                          <label class="col-sm-4 col-form-label" style="padding-top: 1px;text-align: right;">Spokers</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="spoker_id" id="spoker_id">
                              <option value="">- Select Spokers -</option>
                              @foreach($spoker as $spokers)
                                <option value="{{$spokers->id}}" @if(Request()->spoker_id == $spokers->id){{'selected'}}@endif>{{$spokers->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-1">
                        <button type="submit" class="btn btn-info me-2" style="padding:8px;" name="assign" onclick="jQuery('#spoker_id').attr('required', true)">Assign</button>
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
                          <th>Name</th>
                          <th>
                            <input type="checkbox" id="assiged_check_all" onclick="assingContactAll()">
                            Action
                          </th>
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
                        </tr>
                      </thead>

                      <tbody>
                        @php($key=0)
                        @foreach($data as $datas)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$datas->name}}</td>
                            <td>
                              <input type="checkbox" class="assiged_check" id="assiged_check_{{$datas->id}}N" name="assiged_check[]" value="{{$datas->id}}" onclick="assingContact({{$datas->id}})">
                              <input type="hidden" name="contact_id[]"  value="{{$datas->id}}">
                              <input type="hidden" class="assiged_val" id="assiged_val_{{$datas->id}}" name="assiged_val[]" value="N" onclick="assingContact({{$datas->id}})">
                            </td>
                            <td>{{$datas->mobile}}</td>
                            <td>{{$datas->email}}</td>
                            <td><span title="{{$datas->location}}" style="cursor: pointer;">{{ substr($datas->location, 0,  35) }} @if(strlen($datas->location)>35) .... @endif</span></td>
                            <td><span title="{{$datas->contact_type}}" style="cursor: pointer;">{{ substr($datas->contact_type, 0,  30) }} @if(strlen($datas->contact_type)>30) .... @endif</span></td>
                            <td><span title="{{$datas->source}}" style="cursor: pointer;">{{ substr($datas->source, 0,  30) }} @if(strlen($datas->source)>30) .... @endif</span></td>
                            <td><span title="{{$datas->website}}" style="cursor: pointer;">{{ substr($datas->website, 0,  30) }} @if(strlen($datas->website)>30) .... @endif</span></td>
                            <td><span title="{{$datas->additional_info}}" style="cursor: pointer;">{{ substr($datas->additional_info, 0,  30) }} @if(strlen($datas->additional_info)>30) .... @endif</span></td>
                            <td>{{$datas->follow_up}}</td>
                            <td>{{date('d-m-Y', strtotime($datas->follow_up_date))}}</td>
                            <td>{{$datas->favorite_status}}</td>
                            <td>{{$datas->type}}</td>
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
  <!-- <script src="{{url('assets/admin/js/custum/hideMsg.js')}}"></script> -->

  <!--  -->
    <script>
      // Check All at a time
      function assingContactAll(){
        if ($('#assiged_check_all').is(':checked')) {
          jQuery('.assiged_val').val('Y');
          jQuery('.assiged_check').attr('checked', true);
        }
        else{
          jQuery('.assiged_val').val('N');
          jQuery('.assiged_check').attr('checked', false);
        }
      }


      // Check one at a time
      function assingContact(id){
        // alert(id);
        if ($('#assiged_check_'+id).is(':checked')) {
          jQuery('#assiged_val_'+id).val('Y');
        }
        else{
          jQuery('#assiged_val_'+id).val('N');
        }
      }
    </script>
  <!--  -->
@endsection