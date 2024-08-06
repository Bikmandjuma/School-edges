@extends('users.RegisterCover')

@section('content')
    <div class="container mt-5" id="FormId">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card" style="box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title text-center">Reset password here!</h5>
                        @if(session('valid_code'))
                            <script type="text/javascript">
                                setTimeout(function(){
                                    window.location.href = "{{ url('reset/password/') }}/{{ Crypt::encrypt($email) }}/{{ Crypt::encrypt($code) }}";
                                    document.getElementById('spin_id').style.display = "block";
                                }, 5000);
                            </script>
                        @endif
                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ url('submit/reset/password/') }}/{{$email}}/{{$code}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label>New password</label>    
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter new-password">
                                @error('password')
                                    <p style="color:Red;">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <label class="mt-3">Repeat new-password</label>    
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter repeat new-password">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">Confirm&nbsp;<i class="fa fa-check"></i></button>
                            </div>
                        </form><!-- End No Labels Form -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
        </div>
    </div>
@endsection
