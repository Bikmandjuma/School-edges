@extends('mainHome.pages.cover')
@section('content')

    <style type="text/css">
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group label {
            position: absolute;
            top: 10px;
            left: 12px;
            font-size: 16px;
            color: #888;
            transition: all 0.2s ease-out;
            pointer-events: none;
            background-color: #fff; /* Ensure background is opaque */
            padding: 0 4px; /* Space for the label to sit on top of the input */
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 12px 12px 12px; /* Add padding to accommodate label */
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
            top: -12px;
            left: 12px;
            font-size: 12px;
            color: #007bff;
        }
        .form-group input.invalid,
        .form-group textarea.invalid {
            border-color: #e74c3c;
        }
        .form-group textarea {
            resize: vertical;
        }

        #footer{
            display: {{ $hideFooter ? 'none' : 'block'}};
        }
    </style>

    <div class="flex items-center justify-center min-h-screen bg-gray-100" style="margin-top:-50px;">
        <div class="w-full max-w-md" style="box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800">Login here</h2>
                @if (session('error-message'))
                    <p style="display: flex;text-align: center;align-items: center;justify-content: center;justify-items: center;font-family: sans-serif;font-style: italic;margin-top: 20px;color: #e74c3c;font-size: 14px;" id="error_msg">
                        {{ session('error-message') }}
                    </p>
                @endif
                
                @if ($errors->any())
                    <p style="display: flex;text-align: center;align-items: center;justify-content: center;justify-items: center;font-family: sans-serif;font-style: italic;margin-top: 20px;color: #e74c3c;font-size: 14px;" id="error_msg">
                        Please enter username and password to login !
                    </p>
                @endif

                <form class="mt-8 space-y-6" action="{{ route('post_login') }}" method="POST" id="login-form">
                    @csrf
                    <div class="rounded-md">
                        <div  class="form-group">
                            <input name="username" value="{{old('username')}}" type="text" autocomplete="email" placeholder=" " id="username">
                            <label for="username">Enter username</label>
                            <div class="error-message" id="username-error"></div>
                        </div>
                        

                        <div style="margin-top:10px;"  class="form-group">
                            <input name="password" type="password" autocomplete="current-password" placeholder=" " id="password" >
                            <label for="password">Enter password</label><div class="error-message" id="password-error"></div>
                        </div>
                        
                    </div>
                   
                    <div class="flex justify-center">
                        <button type="submit"
                            style="width: 150px;" 
                            class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Login&nbsp;&nbsp;<i class="fa fa-lock-open mt-1"></i>
                        </button>
                    </div>

                </form>
                <p class="mt-4 text-center text-sm text-gray-600">
                    <a href="{{ route('forgotpswd.form')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot password&nbsp;<i class="fa fa-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('footer').style.display="none";
        setTimeout(() => {
            var msg=document.getElementById('error_message_id');
            console.log(msg);
        },2000);

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('login-form');

            form.addEventListener('blur', (event) => {
                const input = event.target;
                const errorElement = document.getElementById(`${input.id}-error`);
                
                if (input.tagName === 'INPUT') {
                    // Clear previous error message
                    errorElement.textContent = '';

                    // Simple validation example
                    if (input.value.trim() === '') {
                        input.classList.add('invalid');
                        errorElement.textContent = 'This field is required.';
                        document.getElementById('error_msg').style.display="none";
                    } else {
                        input.classList.remove('invalid');
                    }
                }
            }, true);
        });
    </script>
@endsection
