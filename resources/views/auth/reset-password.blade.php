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
                            <h4 class="card-title">Reset Password</h4>

                            {{--Update password form--}}
                            <form method="POST" action="{{ route('password.update') }}" class="my-login-validation"
                                  novalidate="">
                                @csrf
                                <div class="form-group">

                                    {{--Hidden fields--}}
                                    <input name="email" type="hidden" hidden value="{{ $request->email }}">
                                    <input name="token" type="hidden" hidden value="{{ $request->route('token') }}">

                                    {{--New password--}}
                                    <label for="new-password">New Password</label>
                                    <input id="new-password" type="password" class="form-control" name="password"
                                           required autofocus data-eye autocomplete="off">

                                    {{--Confirm password--}}
                                    <label for="confirm-password">Confirm Password</label>
                                    <input id="confirm-password" type="password" class="form-control"
                                           name="password_confirmation" required data-eye autocomplete="off">

                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    <div class="form-text text-muted mb-3">
                                        Make sure your password is strong and easy to remember
                                    </div>
                                </div>

                                <div class="form-group m-auto">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Update Password
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
