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
    
    <style>
        a:hover{
            cursor:pointer;
        }
    </style>
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
                        <a onclick="window.location.href='{{ route('guest_homepage') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-home"></i>&nbsp;Home</a>
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

                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('login.form') }}'" class="nav-link text-white text-lg hover:text-gray-300 transition duration-300"><i class="fa fa-lock"></i>&nbsp;Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-gray-900 text-white py-8">
            <div class="container mx-auto">
                <div class="flex flex-wrap -mx-4 mb-8">
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <h3 class="text-xl font-semibold mb-2">About Us</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <h3 class="text-xl font-semibold mb-2">Contact Information</h3>
                        <ul>
                            <li class="mb-2"><span class="icon icon-map-marker"></span> KG 267 St , Kigali,Gasabo,Kacyiru,Kamatamu,Bumbogo</li>
                            <li class="mb-2"><span class="icon icon-phone"></span> +250785389000</li>
                            <li class="mb-2"><span class="icon icon-envelope"></span> email@gmail.com</li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <h3 class="text-xl font-semibold mb-2">Quick Links</h3>
                        <ul>
                            <li class="mb-2"><a href="#" class="hover:underline">Home</a></li>
                            <li class="mb-2"><a href="#" class="hover:underline">About</a></li>
                            <li class="mb-2"><a href="#" class="hover:underline">Services</a></li>
                            <li class="mb-2"><a href="#" class="hover:underline">Contact</a></li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <h3 class="text-xl font-semibold mb-2">Subscribe</h3>
                        <form action="#">
                            <input type="email" class="bg-gray-800 text-white w-full p-2 mb-4 rounded" placeholder="Email">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <p>&copy; <span id="currentYear"></span> All Rights Reserved. Designed by <a class="text-primary hover:underline">{{ config('app.name', 'Laravel') }}</a>.</p>
                </div>
                <script>
                    // Get the current year
                    const currentYear = new Date().getFullYear();

                    // Update the HTML element with id="currentYear"
                    document.getElementById("currentYear").textContent = currentYear;
                </script>

            </div>
        </footer>
</body>
</html>



