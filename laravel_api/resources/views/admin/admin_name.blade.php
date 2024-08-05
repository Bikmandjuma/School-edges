  <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('admin')->user()->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;">
  <div class='online_indicator' title="You are actively online right now !">
      <span class='blink_online_icon'></span>
  </div>

  @if(strlen(auth()->guard('admin')->user()->firstname.' '.auth()->guard('admin')->user()->lastname) > 18)

    <h2 title="{{ auth()->guard('admin')->user()->firstname.' '.auth()->guard('admin')->user()->lastname }}">{{ $admin_name = substr(auth()->guard('admin')->user()->firstname.' '.auth()->guard('admin')->user()->lastname,0,18).'..' }}</h2>
  
  @else

    <h2 title="{{ auth()->guard('admin')->user()->firstname.' '.auth()->guard('admin')->user()->lastname }}">{{ $admin_name = auth()->guard('admin')->user()->firstname.' '.auth()->guard('admin')->user()->lastname }}</h2>
  
  @endif
  
  <h3 class="mt-2">Admin</h3>
  <div class="social-links mt-2">
    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
  </div>