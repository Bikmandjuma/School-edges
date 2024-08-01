<li class="nav-item">
    <button class="nav-link {{ Request::segment(2) == 'profile' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('profile.page') }}'">Overview</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'information' ? 'active' : '' }}" onclick="window.location.href='{{ route('myInformation') }}'">Edit Profile & Info</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }}" onclick="window.location.href='{{ route('show.password') }}'">Change Password</button>
</li>

<li class="nav-item">
  <button class="nav-link {{ Request::segment(2) == 'social-media' ? 'active' : '' }} " onclick="window.location.href='{{ route('social_media') }}'">Social Media</button>
</li>