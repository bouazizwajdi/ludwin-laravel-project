
@extends("layouts.template")
@section("module",__('messages.List of Folders'))
{{-- @section("descmodule",__('messages.View BI reports')) --}}

@section("content")

<div class="card-body pt-7">
    <div class="row">
        @if(count($folders)>0)
         @foreach($folders as $folder)
         <div class="col-md-3">
            <div class="card my-4">
              <div class="card-body p-5 text-center">

                <a href="{{route('files.list',$folder->id)}}"  class="text-center">
                    <img src="{{ asset('images/folder.png')}}" alt="{{ $folder->name }}">
                </a>

            </div>
            <div class="card-title" style="height: 43px">
                    <a href="#">
                        <h5 class="card-title text-center">{{ $folder->name }}</h5>
                    </a>
                 </div>
                </div>
            </div>
         @endforeach
         @else
         <div class="card-body p-5 text-center"> <b>{{__('messages.No folder yet')}}</b></div>
         @endif


    </div>
</div>
@endsection
