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
                                    <label>
                                        <input name="email" type="hidden" hidden value="{{ $request->email }}">
                                    </label><label>
                                        <input name="token" type="hidden" hidden value="{{ $request->route('token') }}">
                                    </label>

                                    {{--New password--}}
                                    <label for="new-password">New Password</label>
                                    <input id="new-password" type="password" class="form-control" name="password"
                                           required autofocus data-eye>

                                    {{--Confirm password--}}
                                    <label for="confirm-password">Confirm Password</label>
                                    <input id="confirm-password" type="password" class="form-control"
                                           name="password_confirmation" required data-eye>

                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    <div class="form-text text-muted">
                                        Make sure your password is strong and easy to remember
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Update Password
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2017 &mdash; Your Company
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('specific_js')
    <script src="{{ asset('assets/js/auth-js.js') }}"></script>
@endsection
