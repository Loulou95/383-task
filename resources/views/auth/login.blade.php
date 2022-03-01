@extends('layouts.app')

@section('content')
    <section class="inner-section">
        <div class="theme-register-section text-center mt-5 lg:w-96">
            <p class="text-gray-500 font-bold">Log in to your account</p>
            <div class="theme-signup-form-inner mt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" placeholder="Enter email" class="theme-form-fields" name="email" required>
                    @error('email')
                    <span class="error-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="password" placeholder="password" class="theme-form-fields mt-5" name="password" required>
                    @error('password')
                    <span class="error-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <button class="rounded-sm bg-blue-700 text-white w-full mt-5 p-2">
                        {{ __('Login') }}
                    </button>
                </form>
                <div class="theme-form-divider mt-5">
                </div>

                <div class="text-center mt-2 flex flex-wrap m-auto justify-evenly mt-5">
                    <a href="#" class="text-xs checkbox-text text-blue-600">Can't Log in?</a>
                    <a href="register" class="text-xs checkbox-text text-blue-600">Register</a>
                </div>
            </div>
        </div>
    </section>
    </html>


@endsection
