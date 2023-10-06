@extends('Spoker.template.base')

@section('title', 'Spoker - All New Follow Up Contacts')

@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      <a href="{{url('/followup-contacts')}}" class="btn btn-success" style="border-bottom: 5px solid #ff4081;padding: 8px;">New Follow Up - <span>{{--$count_assign--}}</span></a>
                      <a href="{{url('/past-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Past Follow Up - <span>{{--$count_unassign--}}</span></a>
                      <a href="{{url('/today-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Today Follow Up - <span>{{--$count_unassign--}}</span></a>
                      <a href="{{url('/future-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Future Follow Up - <span>{{--$count_unassign--}}</span></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>
                  <!-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                      <thead>
                        <tr>
                          <th>Sr No.</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Location</th>
                          <th>Contact Type</th>
                          <th>Source</th>
                          <th>Website</th>
                          <th>Additional Info</th>
                          <th>Status</th>
                          <th>Assign Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php($key=0)
                        @foreach($data as $datas)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->mobile}}</td>
                            <td>{{$datas->email}}</td>
                            <td>{{$datas->location}}</td>
                            <td>{{$datas->contact_type}}</td>
                            <td>{{$datas->source}}</td>
                            <td>{{$datas->website}}</td>
                            <td>{{$datas->additional_info}}</td>
                            <td>{{$datas->status}}</td>
                            <td>{{$datas->assigned_status}}</td>
                            <td>
                              <a href="{{url('/admin/contacts/edit-'.$datas->id)}}"><i class="mdi mdi-table-edit"></i></a>
                              <a href="{{url('/admin/contacts/delete-'.$datas->id)}}"><i class="mdi mdi-delete-forever"></i></a>
                            </td>
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