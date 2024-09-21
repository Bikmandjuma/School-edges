<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
    <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_data->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;">
    @if(strlen($school_data->school_name."Bikman") > 18)
        <h2 title="{{ $school_data->school_name }}">{{ substr($school_data->school_name,0,18).'..' }}</h2>
    @else
        <h2 title="{{ $school_data->school_name }}">{{ $school_data->school_name }}</h2>
    @endif
    <h3 class="mt-2">School , <span style="font-family: sans-serif;color:blueviolet;font-style: italic;">{{ $school_data->school_code }}</span></h3>
    <div class="social-links mt-2">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="linkedin"><i class="fas fa-envelope"></i></a>
        <a href="#" class="linkedin"><i class="fas fa-phone"></i></a>
    </div>
</div>