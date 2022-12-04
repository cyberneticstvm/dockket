<div class="col-lg-3 mt-4 mt-lg-0">
    <div class="d-flex justify-content-center mb-4">
        <div class="profile-image-outer-container">
            <div class="profile-image-inner-container bg-color-primary">
                <img src="{{ ($doctor && $doctor->photo) ? public_path().'/storage/doctor/photo/'.$doctor->photo : public_path().'/storage/doctor/photo/avatar.png' }}">
                @if(request()->segment(2) == 'profile')
                    <span class="profile-image-button bg-color-dark">
                        <i class="fas fa-camera text-light"></i>
                    </span>
                @endif
            </div>
            @if(request()->segment(2) == 'profile')
                <input type="file" id="profile_photo" name="profile_photo" class="form-control profile-image-input">
            @endif
        </div>
    </div>
    <aside class="sidebar mt-2" id="sidebar">
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="/doctor/profile/">My Profile</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'appointments') ? 'active' : '' }}" href="/doctor/appointments/">My Appointments</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'leaves') ? 'active' : '' }}" href="/doctor/leaves/">Mark Leaves</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'settings') ? 'active' : '' }}" href="/doctor/settings/">Settings</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'reports') ? 'active' : '' }}" href="/doctor/reports/">Reports</a></li>
            <li class="nav-item"><a href="/doctor/logout/" class='text-danger'>Logout</a></li>
        </ul>
    </aside>
</div>