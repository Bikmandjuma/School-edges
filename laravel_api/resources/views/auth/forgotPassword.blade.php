@extends('homePage.cover')
@section('content')

    
    <div class="flex items-center justify-center min-h-screen bg-gray-100"  style="margin-top:-50px;">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800">Forgot Password</h2>
                <form class="mt-8 space-y-6">
                    <div class="rounded-md shadow-md -space-y-px">
                        <div>
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Email address">
                        </div>

                    </div>
                   
                    <div class="flex justify-center">
                        <button type="submit"
                            style="width: 150px;" 
                            class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send e-mail&nbsp;&nbsp;<i class="fa fa-paper-plane mt-1"></i>
                        </button>
                    </div>

                </form>
                <p class="mt-4 text-center text-sm text-gray-600">
                
                    <a href="{{ route('login.form')}}" class="font-medium text-indigo-600 hover:text-indigo-500"><i class="fa fa-arrow-left"></i>&nbsp;Login</a>
                </p>
            </div>
        </div>
    </div>

@endsection
