@component('mail::message')
    <h2>Hi how are you doing !</h2>
    <p>You can now register yourself to get access on <b style="color: blue;">{{ config('app.name','app_name') }}</b>'s system !</p>

@component('mail::panel')
    <p>Click the link below to register yourself:</p>
    <a href="{{ URL::to('/') }}/system-user/registration/{{ Crypt::encrypt($data['email']) }}/{{ Crypt::encrypt($data['user_role']) }}" style="font-size:15px;text-decoration: none;font-family: sans-serif;font-style: italic;color: blue;" target="self">Register now</a>
@endcomponent
<p>God bless you , </p>
@endcomponent