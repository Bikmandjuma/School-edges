<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name','our') }}</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/css/style.css">
    <style type="text/css">
        /* Ensure the section takes up the full viewport height */
        .signup {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;     /* Center vertically */
            height: 100vh;           /* Full viewport height */
            margin: 0;               /* Remove default margin */
        }

        /* Container styles */
        .container {
            text-align: center;      /* Center text inside the container */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        /* Ensure content within container is centered */
        .signup-content {
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center;     /* Center content vertically if needed */
        }

        /* Form title styling */
        .form-title {
            margin: 0;               /* Remove default margin */
            font-size: 1.5rem;       /* Adjust font size as needed */
        }

    </style>
</head>
<body>
    <div class="main">

        @if($statusValue == 'Not Allowed' && $registrationDone == 'Not yet')

            <!-- Allowed block -->
            <section>
                <div class="container" style="margin-top:-10%; box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <h1><u>{{ config('app.name','laravel') }}</u></h1><br>
                    <div class="signup-content">
                        <h2 style="font-size:20px;margin-top: -50px;">Please be patient and wait for admin approval.</h2>
                    </div>
                </div>
            </section>

        @elseif($statusValue == 'Allowed' && $registrationDone == 'Not yet')

            <!-- Sign up form -->
            <section class="signup">
                <div class="container" style="margin-top:-20%;box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Register here</h2>
                            @if($errors->any())
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color:red;">{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                            <form method="POST" action="{{ route('main.submit_customer_registration',$id) }}" class="register-form" id="register-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="school_name" id="name" placeholder="Enter school name" value="{{ $school_name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Enter email" value="{{ $email }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                    <input type="phone" name="phone" id="phone" placeholder="Enter phone" value="{{ $phone }}" r eadonly />
                                </div>
                                <div class="form-group">
                                    <label for="username"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <label for="re-enter-password"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="password_confirmation" id="re-enter-password" placeholder="Repeat your password"/>
                                </div>

                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                </div>
                            
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="{{URL::to('/')}}/CustomerSelfRegister/images/signup-image.jpg" alt="sing up image"></figure>
                            <p class="signup-image-link" style="text-decoration: none;color:gray;">You can modify your info in your account after registration !</p>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($statusValue == 'Allowed' && $registrationDone == 'Done')
            <!-- Allowed block -->
            <section>
                <div class="container" style="margin-top:-10%; box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                    <div class="signup-content">
                        <h2 style="font-size:20px;padding: 5px;">You are already a registered user of {{ config('app.name', 'our') }}. <a href="{{ route('main.login.page') }}" style="color:blue;text-decoration: none;" target="self">Login here</a> </h2>
                    </div>
                </div>
            </section>

        @endif

    </div>

    <!-- JS -->
    <script src="{{URL::to('/')}}/CustomerSelfRegister/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/CustomerSelfRegister/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>