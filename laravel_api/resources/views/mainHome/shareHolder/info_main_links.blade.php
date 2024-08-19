<li class="nav-item">
    <button class="nav-link {{ Request::segment(2) == 'profile' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.show.profile') }}'">Overview</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'information' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.show.myInformation') }}'">Edit Profile & Info</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'username' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.show.username') }}'">Change username</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.show.password') }}'">Change Password</button>
</li>