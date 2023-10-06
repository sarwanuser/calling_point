@extends('Spoker.template.base')

@section('title', 'Spoker - All Today Follow Up Contacts')

@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      <a href="{{url('/followup-contacts')}}" class="btn btn-success" style="padding: 10px;">New Follow Up - <span>{{--$count_assign--}}</span></a>
                      <a href="{{url('/past-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Past Follow Up - <span>{{--$count_unassign--}}</span></a>
                      <a href="{{url('/today-followup-contacts')}}" class="btn btn-success" style="border-bottom: 5px solid #ff4081;padding: 8px;">Today Follow Up - <span>{{--$count_unassign--}}</span></a>
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

                  <!-- Start Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form id="myForm" method="post" action="{{url('/admin/contacts/import')}}" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-content" style="background-color: white;text-align: center;">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"  style="color: black;">Import Contact Form Excel Sheet</h4>
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
  <script src="{{url('assets/admin/js/custum/hideMsg.js')}}"></script>
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