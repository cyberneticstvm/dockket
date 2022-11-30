<div class="col-lg-3 mt-4 mt-lg-0">
    <div class="d-flex justify-content-center mb-4">
        <div class="profile-image-outer-container">
            <div class="profile-image-inner-container bg-color-primary">
                <img src="{{ public_path().'/img/avatars/avatar.jpg' }}">
                <span class="profile-image-button bg-color-dark">
                    <i class="fas fa-camera text-light"></i>
                </span>
            </div>
            <input type="file" id="file" class="form-control profile-image-input">
        </div>
    </div>
    <aside class="sidebar mt-2" id="sidebar">
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="/doctor/profile/">My Profile</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'appointments') ? 'active' : '' }}" href="/doctor/appointments/">My Appointments</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'settings') ? 'active' : '' }}" href="/doctor/settings/">Settings</a></li>
            <li class="nav-item"><a class="nav-link text-3 {{ (request()->segment(2) == 'reports') ? 'active' : '' }}" href="/doctor/reports/">Reports</a></li>
        </ul>
    </aside>
</div>