@extends('layouts.login')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center mb-11">
                            <h1 class="text-dark fw-bolder mb-3">
                                {{ __('Reset Password') }}
                            </h1>
                            
                        </div>

                        <div class="fv-row mb-8">

                            <label class="col-form-label required fw-bolder fs-6 py-2" for="email">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-danger">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                     </div>

                    </form>

@endsection
