@extends('Admin.template.base')

@section('title', 'Admin - Spokers')

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
                    <div class="col-lg-4 col-md-4 col-4">
                      <h4 class="card-title">All Spokers</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                    <div class="col-lg-2 col-md-2 col-2" style="text-align: right;">
                      <a href="{{url('/admin/spokers/create')}}" title="Click for create page"><i class="mdi mdi-plus-box"></i></a>
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
                          <th>Spoker Name</th>
                          <th>Spoker Email</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($data as $key=>$datas)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->email}}</td>
                            <td>{{$datas->status}}</td>
                            <td>
                              <a href="{{url('/admin/spokers/edit-'.$datas->id)}}"><i class="mdi mdi-table-edit"></i></a>
                              <a href="{{url('/admin/spokers/delete-'.$datas->id)}}"><i class="mdi mdi-delete-forever"></i></a>
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