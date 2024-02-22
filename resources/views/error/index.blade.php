
@extends("layouts.template")
@section("content")
<div class="d-flex flex-column flex-center flex-column-fluid">

    <div class="d-flex flex-column flex-center text-center">

            <div class="card-body">


    <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">
        Oops!
    </h1>

    <div class="fw-semibold fs-6 text-gray-500 mb-7">
        {{__('messages.We cant find that page')}}
    </div>

    <div class="mb-3">
        <img src="{{ asset('images/404-error.png')}}" class="mw-100 mh-300px theme-light-show" alt="">
        <img src="{{ asset('images/404-error.png')}}" class="mw-100 mh-300px theme-dark-show" alt="">
    </div>

    <div class="mb-0">
        <a href="{{ url('/') }}" class="btn btn-sm btn-primary">{{__('messages.Return Home')}}</a>
    </div>


            </div>

    </div>

</div>
@endsection
