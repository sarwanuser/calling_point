<!-- partial -->
    <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <!-- Start Dynamic Pages -->
            <li class="nav-item nav-category">Dynamic Pages</li>
              <!-- Start Home -->
              {{--<li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-home" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-home"></i>
                  <span class="menu-title">Home</span>
                  <i class="menu-arrow"></i> 
                </a>

              <div class="collapse" id="ui-home">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/menus')}}">Menus</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/boxarea')}}">Box Area</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/services')}}">Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/recent-works')}}">Recent Works</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('admin/feedback')}}">Feedback</a></li>
                </ul>
              </div>
            </li>
          <!-- Start Home -->--}}

          <!-- Start Home -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-team" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-headset"></i>
                  <span class="menu-title">Spokers</span>
                <i class="menu-arrow"></i>
              </a>

              <div class="collapse" id="ui-team">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('/admin/spokers')}}">Spokers</a></li>
                </ul>
              </div>
            </li>
          <!-- Start Home -->

          <!-- Start Contacts -->
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-contacts" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-cellphone-iphone"></i>
                  <span class="menu-title">Contacts</span>
                <i class="menu-arrow"></i>
              </a>

              <div class="collapse" id="ui-contacts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('/admin/contacts')}}">Contacts</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/admin/assign-contacts')}}">Assign Contacts</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/admin/day-spoker-report')}}">Day/Spoker Report</a></li>
                </ul>
              </div>
            </li>
          <!-- Start Contacts -->
        </ul>
      </nav>
    <!-- partial -->