@extends('Single_School.Auth.Cover')
@section('content')

    <style type="text/css">
        body{
            overflow: hidden;
        }
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none !important;
        }


        a:hover {
            text-decoration: underline;
        }


        .form-group label {
            position: absolute;
            top: 12px;
            left: 15px;
            font-size: 14px;
            color: #888;
            transition: 0.2s ease-out;
            pointer-events: none;
            background-color: #fff;
            padding: 0 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s;
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
            top: -12px;
            left: 15px;
            font-size: 12px;
            color: #007bff;
        }

        .form-group input.invalid,
        .form-group textarea.invalid {
            border-color: #e74c3c;
        }

        .login-container {
            position: relative;
            margin-top:60px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        .login-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 6px;
            font-size: 16px;
            border-radius: 6px;
            transition: background-color 0.3s;
            margin: 0 auto; /* Centers the button horizontally */
        }

        .flex-center {
            display: flex;
            justify-content: center;
        }


        .login-btn:hover {
            background-color: #0056b3;
        }

        .text-center a {
            color: #007bff;
            text-decoration: underline;
        }

        #footer {
            display: {{ $hideFooter ? 'none' : 'block' }};
        }

    </style>

    <div class="flex items-center justify-center min-h-screen" style="padding-top:60px;">
        <div class="login-container">
            <h2 class="login-title">Forgot password</h2>
            <br>
            @if (session('error-message'))
                <p class="error-message text-center">{{ session('error-message') }}</p>
            @endif

            @if ($errors->any())
                <p class="error-message text-center">Please enter username and password to login!</p>
            @endif

            <form action="" method="POST" id="login-form" class="mt-8 space-y-6">
                @csrf
                <div class="rounded-md">
                    <div class="form-group">
                        <input name="username" value="{{ old('username') }}" type="text" autocomplete="email" placeholder=" " id="username">
                        <label for="username">Enter email</label>
                        <div class="error-message" id="username-error"></div>
                    </div>
                </div>

                 <div class="flex-center">
                    <button type="submit" class="login-btn">
                        Send request&nbsp;&nbsp;<i class="fas fa-paper-plane mt-1"></i>
                    </button>
                </div>

            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                <a href="{{ route('school.login_home_page',Crypt::encrypt($school_id)) }}"><i class="fa fa-arrow-left"></i>&nbsp;Back to login</a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('login-form');

            form.addEventListener('blur', (event) => {
                const input = event.target;
                const errorElement = document.getElementById(`${input.id}-error`);
                
                if (input.tagName === 'INPUT') {
                    errorElement.textContent = '';

                    if (input.value.trim() === '') {
                        input.classList.add('invalid');
                        errorElement.textContent = 'This field is required.';
                    } else {
                        input.classList.remove('invalid');
                    }
                }
            }, true);
        });
    </script>
@endsection
