<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
<nav class="bg-blue-900">
        <div class="container mx-auto flex items-center justify-between py-4">
            <a class="navbar-brand text-white font-bold text-2xl" href="index.html">{{ config('app.name'),'Laravel' }}</a>
            <button class="navbar-toggler text-white focus:outline-none lg:hidden" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu text-2xl"></span>
            </button>
            <div class="collapse navbar-collapse lg:flex lg:items-center lg:justify-end" id="ftco-nav">
                <ul class="flex flex-col lg:flex-row lg:space-x-8 mt-4 lg:mt-0">
                    <li class="nav-item">
                        <a  onclick="window.location.href='{{ route('guest_homepage') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('about_us') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-wrench"></i>&nbsp;About</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('teachers') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-users"></i>&nbsp;Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('course') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-book"></i>&nbsp;Courses</a>
                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('contact') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-phone"></i>&nbsp;Contact</a>
                    </li>

                    <li class="nav-item" id="login_link">
                        <a onclick="window.location.href='{{ route('login.form') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-lock"></i>&nbsp;Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>



