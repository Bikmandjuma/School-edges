<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">
    /* Importing Google Fonts - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
      max-width: 700px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: calc(100% / 3 - 20px); /* Adjust to fit three columns */
    }


    form .input-box span.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .user-details .input-box input {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
      border-color: #9b59b6;
    }

    form .gender-details .gender-title {
      font-size: 20px;
      font-weight: 500;
    }

    form .category {
      display: flex;
      width: 80%;
      margin: 14px 0;
      justify-content: space-between;
    }

    form .category label {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
      background: #9b59b6;
      border-color: #d9d9d9;
    }

    form input[type="radio"] {
      display: none;
    }

    form .button {
      height: 45px;
      margin: 35px 0
    }

    form .button input {
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    form .button input:hover {
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    /* Responsive media query code for mobile devices */
    @media(max-width: 584px) {
      .container {
        max-width: 100%;
      }

      form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
      }

      form .category {
        width: 100%;
      }

      .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
      }

      .user-details::-webkit-scrollbar {
        width: 5px;
      }
    }

    /* Responsive media query code for mobile devices */
    @media(max-width: 459px) {
      .container .content .category {
        flex-direction: column;
      }
    }

    .error-message{
      color:red;
      font-family: sans-serif;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <div class="title">Fill this form first</div>
    <div class="content">
      <!-- Registration form -->
        <form action="{{ route('school_employee_admin_submit_registration_form', $school_id) }}" method="POST">
        @csrf
        <div class="user-details">
          <!-- Input for First Name -->
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="firstname" placeholder="Enter your first name" value="{{ old('firstname') }}">
            @error('firstname')
                <span class="error-message">{{ $message }}</span>
            @enderror

          </div>
          <!-- Input for Middle Name -->
          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" name="middle_name" placeholder="Enter your middle name" value="{{ old('middle_name') }}">
          </div>
          <!-- Input for Last Name -->
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lastname" placeholder="Enter your last name" value="{{ old('lastname') }}">
            @error('lastname')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Username -->
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}">
            @error('username')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Email -->
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Phone Number -->
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Date of Birth -->
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="dob" placeholder="Enter your date of birth"  value="{{ old('dob') }}">
            @error('dob')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Password -->
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <!-- Input for Confirm Password -->
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_confirmation" placeholder="Confirm your ">
            @error('password_confirmation')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
      
        </div>
        
        <div class="gender-details">
          <!-- Radio buttons for gender selection -->
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-2" value="Female" disabled>
          <span class="gender-title">Gender</span>
          <div class="category">
            <!-- Label for Male -->
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <!-- Label for Female -->
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-2">
            </label>
            @error('gender')
                <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <!-- Submit button -->
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>

    </div>
  </div>
</body>
</html>