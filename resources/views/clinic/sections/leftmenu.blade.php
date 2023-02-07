<div class="col-lg-3 mt-4 mt-lg-0">
    <div class="d-flex justify-content-center mb-4">
        <div class="profile-image-outer-container">
            <div class="profile-image-inner-container bg-color-primary">
                <img src="{{ ($clinic && $clinic->photo) ? public_path().'/storage/clinic/photo/'.$clinic->photo : public_path().'/storage/clinic/photo/avatar.png' }}">
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
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="/clinic/profile/">Profile</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'requests') ? 'active' : '' }}" href="/clinic/requests/">Requests</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'services') ? 'active' : '' }}" href="/clinic/services/">Services</a></li>
            <li class="nav-item"><a href="/clinic/logout/" class='text-danger'>Logout</a></li>
        </ul>
    </aside>
</div>