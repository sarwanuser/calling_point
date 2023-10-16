<!-- partial -->
    <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <!-- Start Assign Contact List -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-team" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-headset"></i>
                  <span class="menu-title">Contacts List</span>
                <i class="menu-arrow"></i>
              </a>

              <div class="collapse" id="ui-team">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('/assign-contacts')}}">Assign Contact List</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/favorite-contacts')}}">Favorite Contact List</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/donot-call-contacts')}}">Do Not Call Contact List</a></li>
                </ul>
              </div>
            </li>
          <!-- Start Assign Contact List -->

          <!-- Start Followup Contact -->
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-followup" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-headset"></i>
                  <span class="menu-title">Followup Contact</span>
                <i class="menu-arrow"></i>
              </a>

              <div class="collapse" id="ui-followup">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('/followup-contacts')}}">Followup Contact</a></li>
                </ul>
              </div>
            </li>
          <!-- Start Followup Contact -->

        </ul>
      </nav>
    <!-- partial -->