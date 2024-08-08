@extends('homePage.cover')
@section('content')
<style>
        
        .form-container {
            /*max-width: 500px;
            width: 100%;*/
            margin: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0px rgba(0,0,0,0.2);
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group label {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 16px;
            color: #888;
            transition: all 0.2s ease-out;
            pointer-events: none;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            padding-top: 30px; /* Space for the floating label */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label,
        .form-group textarea:focus + label,
        .form-group textarea:not(:placeholder-shown) + label {
            top: -10px;
            left: 0;
            font-size: 12px;
            color: #007bff;
            background: #fff;
            padding: 0 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
    </style>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <!-- <div class="heading" style='background-image:url("{{ URL::to('/')}}/homePage/assets/img/contact_us.jfif");'> -->
        <div class="heading" style="
            background-image: url('{{ URL::to('/')}}/homePage/assets/img/events-item-2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
          ">
            
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="text-secondary">Contact us</h1>
              @for($i=0;$i<7;$i++)
                <br>
              @endfor
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs bg-secondary">
        <div class="container">
          <ol>
            <li><a href="#">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <!-- <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-1.9386681!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

        <!-- <iframe style="border:0; width: 100%; height: 300px;" 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-1.9380443!3d30.0837304!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDE2JzU5LjgiTiAxwrAwMScxNy4zIkU!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" 
            frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <iframe 
          width="600" 
          height="450" 
          style="border:0" 
          loading="lazy" 
          allowfullscreen 
          referrerpolicy="no-referrer-when-downgrade" 
          src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=LATITUDE,LONGITUDE">
        </iframe> -->

<iframe 
  style="border:0; width: 100%; height: 300px;" 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.937848161928!2d30.084165!3d-1.938114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca6b70fb12b83%3A0x80a53a8a0585e0c6!2sKigali!5e0!3m2!1sen!2srw!4v1676961268712!5m2!1sen!2srw" 
  frameborder="0" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>


      </div>
      <!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="text-center">
                <h1 style="font-size: 25px;font-family: sans-serif;opacity: 0.5;" id="contact_title_id"><u>Contact us on following address</u></h1>
            </div>

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0 bg-primary"></i>
              <div>
                <h3>Address</h3>
                <p>Kigali Rwanda ,KG 567 St</p>
                <p>Gasabo-Kacyiru-Kamatamu-Rwimbogo</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0 bg-primary"></i>
              <div>
                <h3>Call Us</h3>
                <p>+250780000000</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0 bg-primary"></i>
              <div>
                <h3>Email Us</h3>
                <p>{{ config('app.name','school-name') }}@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            
            @if($errors->any())
              <div class="d-flex align-items-center justify-content-center" id="error_msg">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      @foreach($errors->all() as $error)
                          {{ $error }}<br>
                      @endforeach
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              </div>
            @endif
<!-- 
            <form action="{{ route('guestSubmitcontact') }}" method="post" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message">{{ old('message') }}</textarea>
                </div>

                <div class="col-md-12 text-center">
                  <!-- <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>


 -->
                <div class="form-container">
                  <form>
                      <div class="form-group">
                          <input type="text" id="name" name="name" placeholder=" " required>
                          <label for="name">Name</label>
                      </div>
                      <div class="form-group">
                          <input type="email" id="email" name="email" placeholder=" " required>
                          <label for="email">Email</label>
                      </div>
                      <div class="form-group">
                          <textarea id="message" name="message" rows="4" placeholder=" " required></textarea>
                          <label for="message">Message</label>
                      </div>
              
                          <button type="submit" class="btn btn-primary">Send Message</button>
                      </div>

                  </form>
                </div>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
@endsection