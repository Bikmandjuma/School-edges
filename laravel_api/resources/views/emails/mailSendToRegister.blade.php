@component('components.email-layout', ['title' => 'Register Now'])
    <h1>Hello!</h1>
    <p>Click the link below to register yourself:</p>
    <a href="{{ URL::to('/') }}/system-user/registration/{{ Crypt::encrypt($data['email']) }}/{{ Crypt::encrypt($data['user_role']) }}">Click me to register yourself</a>
@endcomponent
