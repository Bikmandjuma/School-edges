@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3 col-sm-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">All schools</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-chalkboard-teacher"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $customer_count }}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3 col-sm-3">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">System users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $customer_count }}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3 col-sm-3">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user-graduate"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-3 col-md-3 col-sm-3">
                  <div class="card info-card revenue-card">

                    <div class="card-body">
                      <h5 class="card-title">Online users</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="ps-3">
                          <h6>0</h6>
                          <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Revenue Card -->

                <div class="row">

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Line Chart</h5>

                  <!-- Line Chart -->
                  <canvas id="lineChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#lineChart'), {
                        type: 'line',
                        data: {
                          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','aug','sept','oct','nov','dec'],
                          datasets: [{
                            label: 'Line Chart',
                            data: [65, 59, 80, 81, 56, 55, 40 ,43, 56, 78, 91, 126,],
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                          }]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                    });
                  </script>
                  <!-- End Line CHart -->

                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar CHart</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','aug','sept','oct','nov','dec'],
                          datasets: [{
                            label: 'Bar Chart',
                            data: [65, 59, 80, 81, 56, 55, 40 ,43, 56, 78, 91, 126,],
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                              'rgb(255, 99, 132)',
                              'rgb(255, 159, 64)',
                              'rgb(255, 205, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(54, 162, 235)',
                              'rgb(153, 102, 255)',
                              'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                    });
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
@endsection