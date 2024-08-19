@extends('mainHome.pages.cover')
@section('content')

 <style type="text/css">
        html, body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
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

    <div class="flex items-center justify-center min-h-screen bg-gray-100"  style="margin-top:-100px;">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800">Forgot Password</h2>
                <form class="mt-8 space-y-6" action="{{ route('submit-forgot-password') }}" method="POST" id="forgot-pswd-form">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            
                            <input name="email" type="email" autocomplete="email"
                                placeholder=" " id="email">
                            <label for="email">Email address</label>
                            <div class="error-message" id="email-error"></div>
                            <p class="error-message" id="error_msg">@error('email')  {{ $message }} @enderror</p>
                        </div>
                    </div>
                   
                    <div class="flex justify-center">
                        <button type="submit"
                            style="width: 200px;" 
                            class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send e-mail&nbsp;&nbsp;<i class="fa fa-paper-plane mt-1"></i>
                        </button>
                    </div>

                </form>
                <p class="mt-4 text-center text-sm text-gray-600">
                
                    <a href="{{ route('main.login.page')}}" class="font-medium text-indigo-600 hover:text-indigo-500"><i class="fa fa-arrow-left"></i>&nbsp;Login</a>
                </p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('forgot-pswd-form');

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