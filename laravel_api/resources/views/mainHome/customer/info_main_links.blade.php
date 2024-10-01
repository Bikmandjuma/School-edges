<li class="nav-item">
    <button class="nav-link {{ Request::segment(2) == 'profile' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.customer.show.profile') }}'">Overview</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'information' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.customer.show.myInformation') }}'">Edit Info</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'username' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.customer.show.username') }}'">Username</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.customer.show.password') }}'">Password</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'logo' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.customer.logo') }}'">Logo</button>
</li>