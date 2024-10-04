@extends('mainHome.customer.cover')
@section('content')
    <div class="pagetitle">
      <h1>Payment plan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">payment-plan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">

          <div class="card text-center">
            
            <div class="card-header">
              <h4>Pricing and Payment Instructions</h4>
            </div>
            <div class="card-body" style="font-family: sans-serif;">
                <p>At {{ config('app.name','laravel') }}, we believe in providing schools with flexible pricing options that scale with your needs. Our pricing is determined by the number of students enrolled in your school, ensuring that you only pay for what you need.
                
                  We offer two types of payment plans to fit your budget and scheduling preferences.

                </p>
            </div>
          </div>
          
          <div class="row">
              <!-- Single Table -->
              <div class="col-lg-1"></div>
              <div class="col-lg-5 col-md-12 col-12">
                
                  <div class="card text-center">
                    <div class="card-body">
                      <i class="icofont-university" style="font-size:50px;"></i>
                      <h5 class="card-header text-center">Termly Plan</h5>
                          <ul style="list-style-type: none;">
                            <br>
                              <li><i class="icofont icofont-users"></i>&nbsp;Number of Students: <span id="min">0</span> - <span id="max">200</span></li>
                              <br>
                              <li><i class="icofont icofont-money"></i>&nbsp;Amount: <span id="amount">300,000 FRW</span></li>
                          </ul>
                          <input type="range" id="student-progress" min="0" max="3000" value="500">
                          <p id="output"></p>

                          <script type="text/javascript">
                            var cool=document.getElementById('student-progress');
                            cool.addEventListener('click',function(){
                              document.getElementById('output').innerHTML=cool;
                            });
                          </script>
                          
                    </div>
                    <div class="card-body">
                          <a class="btn btn-primary" href="#">Choose</a>
                    </div>
                  </div>
              </div>
              <div class="col-lg-5 col-md-12 col-12">
                  <div class="card text-center">
                    <div class="card-body">
                      <i class="icofont-university" style="font-size:50px;"></i>
                      <h5 class="card-header text-center">Annaully Plan</h5>
                          <ul style="list-style-type: none;">
                            <br>
                              <li><i class="icofont icofont-users"></i>&nbsp;Number of Students: <span id="min">0</span> - <span id="max">200</span></li>
                              <br>
                              <li><i class="icofont icofont-money"></i>&nbsp;Amount: <span id="amount">300,000 FRW</span></li>
                          </ul>
                          <input type="range" id="student-progress" min="0" max="3000" value="500">
                          
                    </div>
                    <div class="card-body">
                          <a class="btn btn-primary" href="#">Choose</a>
                    </div>
                  </div>                  
              </div>
              <div class="col-lg-1"></div>
          </div>   

        </div>
      </div>
    </section>

    <script type="text/javascript">
    // Pricing ranges for monthly plan

    const pricingRangesMonthly = [
      <?php foreach ($price_range as $data): ?>
        { min: 0, max: 200, price: 100000 },
          { min: 201, max: 450, price: 200000 },
          { min: 451, max: 500, price: 300000 },
          { min: 501, max: 600, price: 320000 },
          { min: 601, max: 700, price: 420000 },
          { min: 701, max: 800, price: 520000 },
          { min: 801, max: 900, price: 620000 },
          { min: 901, max: 1000, price: 720000 },
          { min: 1001, max: 1100, price: 820000 },
          { min: 1101, max: 1200, price: 920000 },
          { min: 1201, max: 1300, price: 1000000 },
          { min: 1301, max: 1400, price: 1200000 },
      <?php endforeach ?>
        
        // Add more ranges as needed
    ];

    // Get HTML elements
    const progressBar = document.getElementById('student-progress');
    const minDisplay = document.getElementById('min');
    const maxDisplay = document.getElementById('max');
    const amountDisplay = document.getElementById('amount');

    // Function to get the price based on student count and update range
    function getPrice(students) {
        let price = 0;
        let minRange = 0;
        let maxRange = 0;

        for (const range of pricingRangesMonthly) {
            if (students >= range.min && students <= range.max) {
                price = range.price;
                minRange = range.min;
                maxRange = range.max;
                break;
            }
        }
        
        // Optionally handle cases where students are out of defined ranges
        if (price === 0) {
            price = "Pricing not available";
            minRange = 0;
            maxRange = 3000; // Default max range
        }

        return { price, minRange, maxRange };
    }

    // Function to update the displayed amount and ranges based on the number of students
    function updateAmount() {
        const students = parseInt(progressBar.value);
        const { price, minRange, maxRange } = getPrice(students);
        
        minDisplay.textContent = minRange;
        maxDisplay.textContent = maxRange;
        amountDisplay.textContent = typeof price === 'number' ? `${price.toLocaleString()} FRW` : price;
    }

    // Initialize the display
    updateAmount();

    // Add event listener to update the display when the progress bar changes
    progressBar.addEventListener('input', updateAmount);

  </script>

@endsection