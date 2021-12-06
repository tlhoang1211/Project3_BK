@extends('layouts.master', ['withFooter' => false])

@section('specific_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth.css') }}">
@endsection

@section('content')
    <section class="h-100 my-login-page">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Forgot Password</h4>

                            {{-- Successful message --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Email form --}}
                            <form method="POST" action="{{ route('password.request') }}" class="my-login-validation"
                                  novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required
                                           autofocus>
                                    @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-feedback text-danger">
                                        Email is invalid
                                    </div>
                                    <div class="form-text text-muted">
                                        By clicking "Reset Password" we will send a password reset link
                                    </div>
                                </div>

                                <div class="form-group mt-3 d-flex flex-row btn-container justify-content-between">
                                    <a href="{{ route('login') }}" class="btn btn-secondary btn-block">
                                        Back to Login/Register
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset Password
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2021 &mdash; Wanderlust
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('specific_js')
    <script src="{{ asset('assets/js/auth-js.js') }}"></script>
@endsection
