<!-- <div> -->
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<!-- </div> -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007bff;
            font-size: 24px;
            margin-top: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color:white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        {{ $slot }}
    </div>
</body>
</html>

