@extends('layouts.app')

@section('content')
<div class="container">
    <section class="inner-section">
        <div class="theme-register-section text-center mt-5 lg:w-96">
            <p class="text-gray-500 font-bold">Signup</p>
            <div class="theme-signup-form-inner mt-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" placeholder="Name" class="theme-form-fields" name="name" @error('name') is-invalid @enderror>
                    @error('name')
                    <span class="error-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input type="text" placeholder="Email" class="theme-form-fields mt-5" name="email">
                    @error('email')
                    <span class="error-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input type="text" placeholder="Location" class="theme-form-fields mt-5" name="location">
                    @error('location')
                    <span class="error-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input type="password" placeholder="Create password" class="theme-form-fields mt-5 @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                    <span class="error-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input type="password" placeholder="Confirm password" class="theme-form-fields mt-5 @error('password') is-invalid @enderror" name="password_confirmation" required>
                    @error('password')
                    <span class="error-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    <button class="rounded-sm bg-blue-700 text-white w-full mt-5 p-2">
                        Sign up
                    </button>
                </form>
                <div class="theme-form-divider mt-5">
                </div>

                <div class="text-center mt-2">
                    <a href="login" class="text-xs checkbox-text text-blue-600">Already have a task-tracker account? Log in</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
