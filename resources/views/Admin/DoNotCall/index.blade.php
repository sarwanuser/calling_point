@extends('Admin.template.base')

@section('title', "Admin - All Don't Calls")

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                      <h4 class="card-title">All Don't Calls</h4>
                    </div>
                    <div class="col-lg-8 col-md-8 col-8">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>
                  
                  <form class="form-sample">
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
                        <a href="{{url('/admin/assign-contacts')}}" class="btn btn-warning" style="padding:8px;">Reset</a>
                      </div>
                  </form>

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
                              <a href="{{url('/admin/donot-call/approve-'.$datas->id)}}" title="Click for approve"><i class="mdi mdi-thumb-up-outline"></i></a>
                              <a href="{{url('/admin/donot-call/reject-'.$datas->id)}}" title="Click for reject"><i class="mdi mdi-thumb-down-outline"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <!-- Start Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form id="myForm" method="post" action="{{url('/admin/contacts/import')}}" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-content" style="background-color: white;text-align: center;">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"  style="color: black;">Import Contact By Excel Sheet</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <div class="modal-body" style="padding: 3rem;">
                              <input type="file" name="file" id="files_excel" required>
                            </div>
                            <div class="modal-footer" style="display: inline;">
                            <div id="ResMsg2" style="font-size: 13px;">&nbsp;</div>
                              <a href="{{url('/assets/admin/sample/SampleContacts.xlsx')}}" class="btn btn-warning" style="color:white;"><i class="mdi mdi-download"></i> Sample</a>
                              {{--<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Close</button>--}}
                              <button type="submit" class="btn btn-primary" id="submit_btn">Import</button>
                            </div>
                          </div>
                        </from>
                      </div>
                    </div>
                  <!-- Start Modal -->

                </div>
              </div>
            </div>
        </div>
      </div>
      @endsection
@section('scripts')
  <!-- <script src="{{url('assets/admin/js/custum/hideMsg.js')}}"></script> -->
  <!-- <script>    
    jQuery(document).ready(function(){
      jQuery.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery('#myForm').on('submit', function(e){
        e.preventDefault();
        var btn  = jQuery('#submit_btn');
        var msg  = jQuery('#ResMsg2');
        var form = new FormData(this);
        let file = jQuery('#files_excel');
        form.append('file', files);
        var url = '/admin/contacts/import';
        jQuery.ajax({
          type: 'POST',
          url: url,
          data: form,
          cache: false
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend:function(){
            msg.html('&nbsp;');
            btn.html("<i class='fa fa-circle-o-notch fa-spin'></i> Importing");
          },
          success: function(data) {
            if (data.status=='1') {
              // Ajax call completed successfully
              // alert(data.msg);
              msg.html(data.msg).css('color', 'green');
              jQuery('#myForm').trigger('reset');
              btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Import&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
              setTimeout(() => {
                jQuery(msg).html('&nbsp;');
              },3500);
            } else {
              // alert(data.msg);
              msg.html(data.msg).css('color', 'red');
              btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Import&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            }
          },
          error: function(data) {
            // Some error in ajax call
            // alert("some Error");
            msg.html("some Error").css('color', 'red');
            btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Import&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
          }
        });  
      });
    });
  </script> -->
@endsection