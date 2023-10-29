@extends('Admin.template.base')

@section('title', 'Admin - Dashboard')

@section('styles')
@endsection

@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                  </li>
                  {{--
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                  </li>--}}
                </ul>
                {{--
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                  --}}
              </div>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="statistics-details align-items-center justify-content-between">
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <p class="statistics-title">Total contacts</p>
                            <h3 class="rate-percentage">{{@getNoOfTotalContactAdmin()}}</h3>
                            <div class="row">
                              <div class="col-md-6 col-lg-6">
                                <p class="text-danger d-flex" title="Assign Contacts" style="cursor:pointer;">{{--<i class="mdi mdi-menu-down">--}}</i><span>{{@getNoOfTotalAssignAdmin()}}</span></p>
                              </div>

                              <div class="col-md-6 col-lg-6">
                                <p class="text-success d-flex" title="Unassign Contacts" style="cursor:pointer;">{{--<i class="mdi mdi-menu-up">--}}</i><span>{{@getNoOfTotalUnassignAdmin()}}</span></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <p class="statistics-title">Total Spokes</p>
                            <h3 class="rate-percentage">{{@getNoOfTotalSpokers()}}</h3>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <p class="statistics-title">Total Today Followup</p>
                            <h3 class="rate-percentage">{{@getNoOfTotalTodayFollowUpAdmin()}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
@section('scripts')
@endsection