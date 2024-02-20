
@extends("layouts.template")
@section("module",__('messages.List of Reports'))
@section("descmodule",__('messages.View BI reports'))

@section("content")

<div class="card-body pt-7">
    <div class="row">
        @if(count($reports)>0)
         @foreach($reports as $report)
         <div class="col-md-4">
            <div class="card my-4">
              <div class="card-body p-5">
                <a href="{{route("reports.show",$report->id)}}" class="text-center">
                    <img src="@if($report->logo) {{ asset('files/reports/'.$report->logo)}} @else {{ asset('images/bi.png')}} @endif" class="card-img-top" alt="{{ $report->name }}">
                </a>
            </div>
            <div class="card-title" style="height: 43px">
                    <a href="{{route("reports.show",$report->id)}}">
                        <h5 class="card-title text-center">{{ $report->name }}</h5>
                    </a>
                 </div>
                </div>
            </div>
         @endforeach
         @else
         <div class="card-body p-5 text-center"> <b>{{__('messages.No reports yet')}}</b></div>
         @endif


    </div>
</div>
@endsection
