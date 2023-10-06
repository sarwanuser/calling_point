@extends('Admin.template.base')

@section('title', 'Admin - Update Spokers')

@section('styles')
@endsection

@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-6">
                    <h4 class="card-title">Update Spokers</h4>
                  </div>
                  <div class="col-lg-6 col-md-6 col-6" style="text-align: right;">
                    <a href="{{url('/admin/contacts')}}" title="Click for return back"><i class="mdi mdi-arrow-left-bold-circle"></i></a>
                  </div>
                </div>
                <form class="form-sample" id="myForm">
                  <p class="card-description">
                    Spokers Details
                  </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Spoker Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" value="{{$data->name}}" required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" name="mobile" value="{{$data->mobile}}" required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="email" value="{{$data->email}}" required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                          <textarea type="text" class="form-control" name="location" style="height:50px;">{{$data->location}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Contact Type</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="contact_type" value="{{$data->contact_type}}"/>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="website" value="{{$data->website}}"/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Source</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="source" value="{{$data->source}}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Additional Info</label>
                        <div class="col-sm-9">
                          <textarea type="text" class="form-control" name="additional_info" style="height:50px;">{{$data->additional_info}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="status" required>
                            <option value="ACTIVE" @if($data->status=='ACTIVE') {{'selected'}} @endif>Active</option>
                            <option value="INACTIVE" @if($data->status=='INACTIVE') {{'selected'}} @endif>Inactive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary me-2" id="submit_btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbspUpdate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <br><br>
                  <div id="alertMSG">&nbsp;</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection

@section('scripts')
  <script>    
    jQuery(document).ready(function(){
      jQuery.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery('#myForm').on('submit', function(e){
        e.preventDefault();
        var btn  = jQuery('#submit_btn');
        var msg  = jQuery('#alertMSG');
        var form = new FormData(this);
        var url = '/admin/contacts/update-{{$data->id}}';
        jQuery.ajax({
          type: 'POST',
          url: url,
          data: form,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend:function(){
            msg.html('&nbsp;');
            btn.html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating");
          },
          success: function(data) {
            if (data.status=='1') {
              // Ajax call completed successfully
              // alert(data.msg);
              msg.html(data.msg).css('color', 'green');
              btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbspUpdate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
              setTimeout(() => {
                jQuery(msg).html('&nbsp;');
              },3500);
            } else {
              // alert(data.msg);
              msg.html(data.msg).css('color', 'red');
              btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbspUpdate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            }
          },
          error: function(data) {
            // Some error in ajax call
            // alert("some Error");
            msg.html("some Error").css('color', 'red');
            btn.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbspUpdate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
          }
        });  
      });
    });
  </script>
@endsection