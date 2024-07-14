@extends('homePage.cover')
@section('content')
        <!-- END nav -->

    <section class="home-slider owl-carousel">
        
        <div class="slider-item bg-cover bg-center" style="background-image:url('{{ asset('homePage/images/bg_1.jpg') }}');">
            <div class="overlay bg-black opacity-50"></div>
            <div class="container mx-auto">
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-6xl text-white">Kids Are The Best <span class="block">Explorers In The World</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item bg-cover bg-center" style="background-image:url('{{ asset('homePage/images/bg_2.jpg') }}');">
            <div class="overlay bg-black opacity-50"></div>
            <div class="container mx-auto">
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-6xl text-white">Kids Are The Best <span class="block">Explorers In The World</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item bg-cover bg-center" style="background-image:url('{{URL::to('/')}}/homePage/images/bg_3.jpg');">
            <div class="overlay bg-black opacity-50"></div>
            <div class="container mx-auto">
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-6xl text-white">Perfect Learned<span class="block"> For Your Child</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="bg-gray-200 py-2">
            <div class="container mx-auto flex flex-wrap">
                <div class="w-full md:w-1/2 bg-white p-6 order-last md:order-first">
                    <h2 class="text-3xl font-bold mb-4">Welcome to {{ config('app.name'),'Laravel' }}</h2>
                    <p class="mb-4">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
                    <p class="mb-4">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.</p>
                    <!-- <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p> -->
                </div>
                <div class="w-full md:w-1/2 bg-light p-6">
                    <h2 class="text-3xl font-bold mb-4">What We Offer</h2>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-security"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Safety First</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-reading"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Regular Classes</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-diploma"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Certified Teachers</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-education"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Sufficient Classrooms</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-jigsaw"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Creative Lessons</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center bg-gray-700 text-white rounded-full w-12 h-12 mr-4"><span class="flaticon-kids"></span></div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">Sports Facilities</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Our Courses</h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-primary text-white rounded-full w-16 h-16 mb-4 mx-auto"><span class="flaticon-lamp"></span></div>
                            <h3 class="text-2xl font-semibold mb-2">Arts Lesson</h3>
                            <p class="mb-4">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-secondary text-white rounded-full w-16 h-16 mb-4 mx-auto"><span class="flaticon-biology"></span></div>
                            <h3 class="text-2xl font-semibold mb-2">Language Lesson</h3>
                            <p class="mb-4">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-tertiary text-white rounded-full w-16 h-16 mb-4 mx-auto"><span class="flaticon-earth-globe"></span></div>
                            <h3 class="text-2xl font-semibold mb-2">Music Lesson</h3>
                            <p class="mb-4">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-primary text-white py-8">
            <div class="container mx-auto text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex justify-center items-center bg-white text-primary rounded-full w-16 h-16 mr-4"><span class="flaticon-teacher"></span></div>
                            <div>
                                <h3 class="text-3xl font-bold">400</h3>
                                <p class="text-lg">Teachers</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex justify-center items-center bg-white text-primary rounded-full w-16 h-16 mr-4"><span class="flaticon-reading"></span></div>
                            <div>
                                <h3 class="text-3xl font-bold">1000</h3>
                                <p class="text-lg">Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex justify-center items-center bg-white text-primary rounded-full w-16 h-16 mr-4"><span class="flaticon-diploma"></span></div>
                            <div>
                                <h3 class="text-3xl font-bold">900</h3>
                                <p class="text-lg">Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex justify-center items-center bg-white text-primary rounded-full w-16 h-16 mr-4"><span class="flaticon-education"></span></div>
                            <div>
                                <h3 class="text-3xl font-bold">800</h3>
                                <p class="text-lg">Satisfied Parents</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-2">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Certified Teachers</h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-primary text-white rounded-full w-24 h-24 mb-4 mx-auto"><img src="{{URL::to('/')}}/homePage/images/teacher-1.jpg" alt="Teacher 1" class="rounded-full w-full h-full object-cover"></div>
                            <h3 class="text-2xl font-semibold mb-2">Tom Brendon</h3>
                            <p class="mb-4">I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                            <p><i class="fa fa-phone"></i>&nbsp;<i class="fa fa-whatsapp"></i>&nbsp;<i class="fa fa-envelope"></i> </p>
                            <ul class="flex space-x-4 justify-center">
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-twitter"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-facebook"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-secondary text-white rounded-full w-24 h-24 mb-4 mx-auto"><img src="{{URL::to('/')}}/homePage/images/teacher-2.jpg" alt="Teacher 2" class="rounded-full w-full h-full object-cover"></div>
                            <h3 class="text-2xl font-semibold mb-2">Adam Phillips</h3>
                            <p class="mb-4">I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                            <ul class="flex space-x-4 justify-center">
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-twitter"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-facebook"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-center items-center bg-tertiary text-white rounded-full w-24 h-24 mb-4 mx-auto"><img src="{{URL::to('/')}}/homePage/images/teacher-3.jpg" alt="Teacher 3" class="rounded-full w-full h-full object-cover"></div>
                            <h3 class="text-2xl font-semibold mb-2">James Cameron</h3>
                            <p class="mb-4">I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                            <ul class="flex space-x-4 justify-center">
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-twitter"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-facebook"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#" class="text-gray-700 hover:text-primary"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.home-slider').owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    navText: ["<span class='oi oi-chevron-left'></span>","<span class='oi oi-chevron-right'></span>"]
                });
            });
        </script>
@endsection

    