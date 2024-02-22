
@extends("layouts.template")
@section("module",__('messages.List of Excel'))
@section("descmodule")
<img class="w-25 pe-2" src="{{ asset('images/folder.png')}}" alt="{{ $folder->name }}">
{{$folder->name}}
@endsection
@section("btnright")
    <a href="{{ URL::previous() }}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Back')}}
    </a>
@endsection
@section("content")

<div class="card-body pt-7">
    <div class="row">
        @if(count($files)>0)
         @foreach($files as $file)
         <div class="col-md-3">
            <div class="card my-4">
              <div class="card-body p-5 text-center">

                <a href="{{asset('files/excels/'.$file->file)}}"  class="text-center">
                    <img src="{{ asset('images/excel.png')}}" alt="{{ $file->name }}">
                </a>

            </div>
            <div class="card-title text-center" style="height: 43px">
                    <a href="javascript:;">
                        <h5 class="card-title ">{{ $file->name }}</h5>
                    </a>
                    <a href="{{asset('files/excels/'.$file->file)}}" class="btn btn-sm btn-primary">
                        {{__('messages.Download')}}
                    </a>
                 </div>
                </div>
            </div>
         @endforeach
         @else
         <div class="card-body p-5 text-center"> <b>{{__('messages.No Excel File yet')}}</b></div>
         @endif


    </div>
</div>
@endsection
