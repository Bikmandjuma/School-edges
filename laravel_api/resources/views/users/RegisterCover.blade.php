<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name','school-name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/favicon.png" rel="icon">
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    #preview {
        max-width: 100%;
    }
    .img-container {
        max-height: 500px;
    }

    #edit_admin_username:hover{
      cursor: pointer;
    }

    div.online_indicator {
        z-index: 1;
        width: 20px;
        height: 20px;
        margin-right:-80px;
        background-color:lightskyblue;
        border-radius: 50%;
        position: absolute;
        margin-top: 95px;
    }

    div.online_indicator:hover{
      cursor: alias;
    }
      
    span.blink_online_icon {
        display: block;
        width: 20px;
        height: 20px;
        background-color:blue;
        opacity: 0.6;
        border-radius: 50%;
        animation: blink 1s linear infinite;
    }

    /*Animations*/
    @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
          }
    }

    div.online_indicator_main_bar {
        z-index: 1;
        width: 10px;
        height: 10px;
        background-color:skyblue;
        border-radius: 50%;
        position: absolute;
        margin-top: 27px;
        margin-left: 25px;
    }

    div.online_indicator_main_bar:hover{
      cursor: alias;
    }
      
    span.blink_online_icon_main_bar {
        display: block;
        width: 10px;
        height: 10px;
        background-color:blue;
        opacity: 0.6;
        border-radius: 50%;
        animation: blink 1s linear infinite;
    }

    /*Animations*/
    @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
             }
    }

  </style>
</head>

<body>

  <main>
    @yield('content')
  </main>

  <!-- Vendor JS Files -->       
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script type="text/javascript" src="http://www.freetimelearning.com/js/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://www.freetimelearning.com/js/jquery-1.11.3.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::to('/') }}/adminPanel/assets/js/main.js"></script>

</body>

</html>