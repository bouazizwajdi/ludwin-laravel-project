@extends('layouts.login')

@section('content')

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-dark fw-bolder mb-3">
                                {{__('messages.Sign in')}}
                            </h1>
                            <div class="text-gray-500 fw-semibold fs-6">
                                {{__('messages.Please log in to your account')}}
                            </div>
                        </div>



                        <div class="fv-row mb-8">
                            <label class="col-form-label required fw-bolder fs-6 py-2" for="email">{{__('messages.Email')}}</label>


                                <input id="email" type="email" placeholder="{{__('messages.Email')}}" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="fv-row mb-8">
                            <label class="col-form-label required fw-bolder fs-6 py-2" for="password"> {{__('messages.Password')}} </label>


                                <input id="password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" placeholder="{{__('messages.Password')}} " name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>


                        {{-- <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                          @if (Route::has('password.request'))
                                    <a class="link-primary" href="{{ route('password.request') }}">

                                Mot de passe oublié ?
                                    </a>
                                @endif

                        </div> --}}

                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-danger">
                                <span class="indicator-label">  {{__('messages.Sign in')}}</span>
                                <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                            </button>
                        </div>
                    </form>

@endsection
