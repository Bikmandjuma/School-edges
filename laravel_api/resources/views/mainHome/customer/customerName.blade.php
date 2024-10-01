  <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ auth()->guard('customer')->user()->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;"  onclick="window.location.href='{{ route('main.customer.logo') }}'">

  @if(strlen(auth()->guard('customer')->user()->school_name) > 18)

    <h2 title="{{ auth()->guard('customer')->user()->school_name }}">{{ $admin_name = substr(auth()->guard('customer')->user()->school_name,0,18).'..' }}</h2>
  
  @else

    <h2 title="{{ auth()->guard('customer')->user()->school_name }}">{{ $admin_name = auth()->guard('customer')->user()->school_name }}</h2>
  
  @endif
  
  <h3 class="mt-2">School , <span class="text-primary" style="font-family:san-serif;"><b>{{ auth()->guard('customer')->user()->school_code }}</b></span></h3>
  <!-- <div class="social-links mt-2">
    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
  </div> -->