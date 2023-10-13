@extends('Spoker.template.base')

@section('title', 'Spoker - All Today Follow Up Contacts')

@section('styles')
  <style>
    #alertMSG {
      font-size: 15px;
      padding: 2px;
    }
    .glyphicon{
      width: 140px !important;
      font-size: 20px !important;
      color: #ff4081 !important;
    }
    .left.carousel-control{
      width: 3% !important;
    }
    .right.carousel-control{
      width: 12% !important;
    }
  </style>
@endsection
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      <a href="{{url('/followup-contacts')}}" class="btn btn-success" style="padding: 10px;">New Follow Up - <span id="new_id">{{@getFollowupContact('new')}}</span></a>
                      <a href="{{url('/past-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Past Follow Up - <span id="past_id">{{@getFollowupContact('past')}}</span></a>
                      <a href="{{url('/today-followup-contacts')}}" class="btn btn-success" style="border-bottom: 5px solid #ff4081;padding: 8px;">Today Follow Up - <span id="today_id">{{@getFollowupContact('today')}}</span></a>
                      <a href="{{url('/future-followup-contacts')}}" class="btn btn-success" style="padding: 10px;">Future Follow Up - <span id="future_id">{{@getFollowupContact('future')}}</span></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                      @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="container">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <!-- <div class="item active">
                          <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Los Angeles" style="width:100%;">
                        </div>

                        <div class="item">
                          <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Chicago" style="width:100%;">
                        </div> -->
                      
                        @if(count($AssignContacts) != 0)
                          @foreach($AssignContacts as $key=>$AssignContact)
                              <div class="item  @if($key=='0'){{'active'}}@endif">
                                <form id="{{'myForm_'.$AssignContact->id}}">

                                <div class="row">
                                  <div class="col-md-4 col-lg-4">
                                    <span class="con_follow_lable">Contact Number</span>  
                                    <br><input type="text" name="" value="{{$AssignContact->mobile}}" id="" readonly>

                                    <br><span class="con_follow_lable">Contact Name</span>
                                    <br><input type="text" name="" value="{{$AssignContact->name}}" id="" readonly>
                                    
                                    <br><span class="con_follow_lable">Contact Email</span>
                                    <br><input type="text" name="" value="{{$AssignContact->email}}" id="" readonly>
                                    
                                    <br><span class="con_follow_lable">Website</span>
                                    <br><input type="text" name="" value="{{$AssignContact->website}}" id="" readonly>
                                    
                                    <br><span class="con_follow_lable">Location</span>
                                    <br><input type="text" name="" value="{{$AssignContact->location}}" id="" readonly>
                                    
                                    <br><span class="con_follow_lable">Contact Type</span>
                                    <br><input type="text" name="" value="{{$AssignContact->contact_type}}" id="" readonly>
                                    
                                    <br><span class="con_follow_lable">Additional Info</span>
                                    <br><input type="text" name="" value="{{$AssignContact->additional_info}}" id="" readonly>
                                  </div>


                                  <div class="col-md-4 col-lg-4">
                                    <input type="hidden" name="contact_id" value="{{$AssignContact->id}}">
                                    <span class="con_follow_lable">Comment Select</span>  
                                    <br><textarea name="comment" id="comment_{{$AssignContact->id}}" cols="30" rows="7"></textarea>

                                    <div class="row">
                                      <div class="col-md-6 col-lg-6">
                                        <br><input class="validate invalid" required="" aria-required="true" id="follow_up_date_{{$AssignContact->id}}" type="date" name="follow_up_date" min="{{date('Y-m-d', strtotime('-1 day'))}}" value="{{ date('Y-m-d') }}">
                                      </div>

                                      <div class="col-md-6 col-lg-6">
                                        <br>
                                        <select name="status" class="select_status">
                                          <option value="FOLLOWUP" @if($AssignContact->status == 'FOLLOWUP') {{'selected'}} @endif>FollowUp</option>
                                          <option value="COMPLETE" @if($AssignContact->status == 'COMPLETE') {{'selected'}} @endif>COMPLETE</option>
                                          <option value="CLOSE" @if($AssignContact->status == 'CLOSE') {{'selected'}} @endif>CLOSE</option>
                                          {{--
                                            <option value="INACTIVE" @if($AssignContact->status == 'INACTIVE') {{'selected'}} @endif>INACTIVE</option>
                                            <option value="REQUEST" @if($AssignContact->status == 'REQUEST') {{'selected'}} @endif>REQUEST</option>
                                            <option value="UPDATE" @if($AssignContact->status == 'UPDATE') {{'selected'}} @endif>UPDATE</option>
                                          --}}
                                          </select>
                                      </div>

                                      <div class="col-md-6 col-lg-6">
                                        <br>
                                        <select name="favorite_status" class="favorite_status">
                                          <option value="normal" @if($AssignContact->favorite_status == 'normal') {{'selected'}} @endif>Normal</option>
                                          <option value="favorite" @if($AssignContact->favorite_status == 'favorite') {{'selected'}} @endif>Favorite</option>
                                          <option value="unfavorite" @if($AssignContact->favorite_status == 'unfavorite') {{'selected'}} @endif>Unfavorite</option>
                                        </select>
                                      </div>

                                      <div class="col-md-6 col-lg-6">
                                        <br>
                                        @if($AssignContact->status == 'CLOSE')
                                          <button class="btn waves-effect waves-light right" type="submit" name="action" id="add_followup" disabled>CLOSED
                                            <i class="material-icons right">not_interested</i>
                                          </button>
                                        @elseif($AssignContact->status == 'INACTIVE')
                                          <button class="btn waves-effect waves-light right" type="submit" name="action" id="add_followup" disabled>INACTIVE
                                            <i class="material-icons right">not_interested</i>
                                          </button>
                                        @else
                                          <a class="btn btn-primary" name="action" id="submit_btn_{{$AssignContact->id}}" onclick="followUpContact({{$AssignContact->id}})">Submit</a>
                                        @endif</div>
                                    </div>

                                    <div class="col-md-12 col-lg-12" id="alertMSG_{{$AssignContact->id}}">&nbsp;</div>
                                  </div>

                                  <div class="col-md-2 col-lg-2" style="border:1px solid rgb(118, 118, 118);height: 270px;overflow: auto;"">
                                    {{--dd(@getFollowUpDTL($AssignContact->id))--}}
                                    <ul id='' class=''>
                                      @foreach(@getFollowUpDTL($AssignContact->id) as $followUpDTLs)
                                      <li><a href="#!" style="font-size:12px;"><span style="color:#ff4081;">{{date('d M Y h:i A', strtotime($followUpDTLs->created_at))}}:</span> {{$followUpDTLs->comment}}  <span style="padding: 0 19px 11px;float: right;width: 100%;text-align: right;color: #555;font-weight: bold;">{{date('d M Y', strtotime($followUpDTLs->followup_date))}} </span></a></li>
                                      @endforeach
                                    </ul>
                                  </div>
                                </div>
                                </form>
                              </div>
                          @endforeach
                        
                        @else
                          <div style="color:red;text-align:center;">Today Follow Up Contact Not Found.</div>
                        @endif
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left">Previous</span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right">Next</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      @endsection
@section('scripts')
  <script>
    function followUpContact(id){
      // alert(id);
      jQuery.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });

      ///////   null value //////////
          var comment = jQuery('#comment_'+id);
          // not null comment
          if (comment.val()=='') {
            comment.css('border', '1px solid red');
            return false;
          }
          else{
            comment.css('border', '1px solid rgb(118, 118, 118)');
          }

          var follow_up_date = jQuery('#follow_up_date_'+id);
          // not null follow_up_date
          if (follow_up_date.val()=='') {
            follow_up_date.css('border', '1px solid red');
            return false;
          }
          else{
            follow_up_date.css('border', '1px solid rgb(118, 118, 118)');
          }
        ///////////////////////////
      var btn  = jQuery('#submit_btn_'+id);
      var msg  = jQuery('#alertMSG_'+id);
      var form = new FormData($('#myForm_'+id)[0]);
      var url = '/followup-contacts/store';
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
          btn.html("<i class='fa fa-circle-o-notch fa-spin'></i> Submiting");
        },
        success: function(data) {
          if (data.status=='1') {
            // Ajax call completed successfully
            // alert(data.msg);
            msg.html(data.msg).css('color', 'green');
            jQuery('#new_id').html(data.new);
            jQuery('#past_id').html(data.past);
            jQuery('#today_id').html(data.today);
            jQuery('#future_id').html(data.future);
            // jQuery('#myForm').trigger('reset');
            btn.html("Submit");
            setTimeout(() => {
              jQuery(msg).html('&nbsp;');
            },3500);
          } else {
            // alert(data.msg);
            msg.html(data.msg).css('color', 'red');
            btn.html("Submit");
          }
        },
        error: function(data) {
          // Some error in ajax call
          // alert("some Error");
          msg.html("Some Error").css('color', 'red');
          btn.html("Submit");
        }
      });
    }
  </script>
@endsection