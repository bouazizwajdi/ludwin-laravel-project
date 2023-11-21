

@extends("layouts.template")
@section("module",__('messages.View the report').$report->name)
@section("descmodule","")
@section("btnright")
    <a href="{{ URL::previous() }}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Back')}}  
    </a>
@endsection
@section("content")
<div class=" my-5">
        {!!$report->integration_code!!}
</div>

@endsection
