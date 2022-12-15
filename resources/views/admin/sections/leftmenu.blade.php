<div class="col-lg-3 mt-4 mt-lg-0">
    <aside class="sidebar mt-2" id="sidebar">
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'dash') ? 'active' : '' }}" href="/admin/dash/">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'doctor') ? 'active' : '' }}" href="/admin/doctor/">Doctors</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'appointments') ? 'active' : '' }}" href="/admin/appointments/">Appointments</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'specializations') ? 'active' : '' }}" href="/admin/specializations/">Specializations</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'settings') ? 'active' : '' }}" href="/admin/settings/">Settings</a></li>
            <li class="nav-item"><a href="/admin/logout/" class='text-danger'>Logout</a></li>
        </ul>
    </aside>
</div>