    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('available-slots-view')}}" class="nav-link @if (request()->is('/')) active @endif ">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Available Slots
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('unavailable-slots-view')}}" class="nav-link @if (request()->is('unavailable-slots')) active @endif">
              <i class="nav-icon fas fa-stopwatch"></i>
              <p>
                Unavailable Slots
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('unavailable-dates-view')}}" class="nav-link @if (request()->is('unavailable-date')) active @endif">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Unavailable Days
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('booking-slots-view')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Booked Slots
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
