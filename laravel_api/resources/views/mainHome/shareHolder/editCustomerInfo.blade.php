@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>School</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">school</li>
          <li class="breadcrumb-item active">View_school_info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    @include('mainHome.shareHolder.school_name_and_image')
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        @include('mainHome.shareHolder.main_tabs_links_info')
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show {{ Request::segment(2) == 'edit_customer_info' ? 'active' : '' }} profile-overview" id="profile-overview">
                                <h5 class="card-title">School - edit - info </h5>
                                @if($errors->any())
                                    <ul style="text-decoration: none;">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="POST" action="{{ route('main.editCustomerInfo',Crypt::encrypt($school_data->id)) }}">
                                    @csrf

                                    <div class="row mb-3">
                                      <label for="firstname" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Code</label>
                                      <div class="col-md-8 col-sm-8 col-lg-9">
                                        <input name="code" type="text" class="form-control" value="{{ $school_data->school_code }}" disabled>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label for="firstname" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Name</label>
                                      <div class="col-md-8 col-sm-8 col-lg-9">
                                        <input name="school_name" type="text" class="form-control" id="firstname" value="{{ $school_data->school_name }}">
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label for="firstname" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Email</label>
                                      <div class="col-md-8 col-sm-8 col-lg-9">
                                        <input name="email" type="text" class="form-control" id="email" value="{{ $school_data->email }}">
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label for="firstname" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Phone</label>
                                      <div class="col-md-8 col-sm-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" id="phone" value="{{ $school_data->phone }}">
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="country" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Country:</label>
                                        <div class="col-md-8 col-sm-8 col-lg-9">
                                            <select id="country" name="country" class="form-control">
                                                <option value="">Loading countries...</option>
                                            </select>
                                            <p id="selected-country"></p>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                      <label for="firstname" class="col-md-4 col-sm-4 col-lg-3 col-form-label">Username</label>
                                      <div class="col-md-8 col-sm-8 col-lg-9">
                                        <input name="username" type="text" class="form-control" id="username" value="{{ $school_data->username }}" disabled>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-primary">
                                          Save Changes
                                      </button>
                                    </div>
                                  </form><!-- End Profile Edit Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // The preselected country from the database
        const storedCountry = "{{ $school_data->country }}"; // Preselect this country

        // Function to fetch countries from the API and preselect stored country
        function fetchCountries() {
            const countrySelect = document.getElementById('country');

            // Fetch country data from REST Countries API
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    // Clear loading text
                    countrySelect.innerHTML = '';

                    // Loop through the data and add countries to the dropdown
                    data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name.common;; // 2-letter country code
                        option.textContent = country.name.common; // Country name

                        // Check if this country matches the stored country and preselect it
                        if (country.name.common === storedCountry) {
                            option.selected = true;
                        }

                        countrySelect.appendChild(option);
                    });

                    // Display the selected country
                    document.getElementById('selected-country').innerText = 'Selected Country: ' + storedCountry;
                })
                .catch(error => {
                    console.error('Error fetching country data:', error);
                    countrySelect.innerHTML = '<option value="">Failed to load countries</option>';
                });
        }

        // Event listener for when a country is selected
        document.getElementById('country').addEventListener('change', function() {
            const selectedCountry = this.options[this.selectedIndex].text;
            document.getElementById('selected-country').innerText = 'Selected Country: ' + selectedCountry;
        });

        // Fetch countries when the page loads
        fetchCountries();

    </script>
@endsection
