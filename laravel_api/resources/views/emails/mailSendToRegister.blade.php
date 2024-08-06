@component('mail::message')
    <h1>{{ config('app.name','app_name') }}</h1>
    <h2>Hi how are you doing !</h2>
    <p>You can now register yourself to get access on <b style="color: blue;">{{ config('app.name','app_name') }}</b>'s system !</p>

    @component('mail::panel')
        <p>Click the link below to register yourself:</p>
        <a href="{{ URL::to('/') }}/system-user/registration/{{ Crypt::encrypt($data['email']) }}/{{ Crypt::encrypt($data['user_role']) }}">Register yourself</a>
    @endcomponent
    <p>God bless you , </p>
@endcomponent