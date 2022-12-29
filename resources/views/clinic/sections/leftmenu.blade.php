<div class="col-lg-3 mt-4 mt-lg-0">
    <aside class="sidebar mt-2" id="sidebar">
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="/clinic/profile/">Profile</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'requests') ? 'active' : '' }}" href="/clinic/requests/">Requests</a></li>
            <li class="nav-item"><a class="nav-link text-3 text-dark {{ (request()->segment(2) == 'services') ? 'active' : '' }}" href="/clinic/services/">Services</a></li>
            <li class="nav-item"><a href="/clinic/logout/" class='text-danger'>Logout</a></li>
        </ul>
    </aside>
</div>