<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::to('/')}}/CustomerSelfRegister/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container" style="margin-top:-10%;box-shadow:0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register here</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="school_name" id="name" placeholder="Enter school name" value="{{ $school_name }}" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="name" placeholder="Enter email" value="{{ $email }}" disabled />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="phone" id="phone" placeholder="Enter phone" value="{{ $phone }}" disabled />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
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

    </div>

    <!-- JS -->
    <script src="{{URL::to('/')}}/CustomerSelfRegister/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/CustomerSelfRegister/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>