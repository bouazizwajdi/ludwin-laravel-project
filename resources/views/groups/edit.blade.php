@extends("layouts.template")
@section("module",__('messages.Group Management'))
@section("descmodule",__('messages.Edit user groups'))
@section("btnright")
<a href="{{route('groups.index')}}" class="btn btn-sm fw-bold btn-dark">
    {{__('messages.List of Groups')}}
</a>
@endsection
@section("content")

<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2> {{__('messages.Edit group')}}</h2>
    </div>
</div>

<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6 m-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 ">{{__('messages.This form allows you to quickly modify a group and these reports.')}} </div>
            </div>

        </div>
    </div>
<div id="kt_account_settings_profile_details" class="collapse show">

<form action="{{route("groups.update",$group->id)}}" class="form" method="POST">
    @method("PUT")
    @csrf
    <div class="card-body border-top p-9">
        <div class="row mb-6">
<label class="col-lg-3 col-form-label required fw-semibold fs-6" for="name">{{__('messages.Group Name')}}</label>
<div class="col-lg-8 fv-row">
<input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name',$group->name)}}" required>
@error('name')
<div class="text-danger mt-3">{{$message}}</div>
@enderror
</div>
</div>
<div class="row mb-6">
    <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.List Reports')}}</label>
    <div class="col-lg-8 fv-row row">


@foreach ($reports as $report)


<div class=" col-lg-4 col-6 form-check form-check-custom align-items-start pt-4 form-check">
    <input class="form-check-input me-3" type="checkbox" name="reports[]" value="{{$report->id}}" id="report{{$report->id}}"  @if(in_array($report->id,$reprts_id)) checked @endif/>
    <span class="form-check-label text-dark d-flex flex-column align-items-start">
        <span class="fw-bold fs-5 mb-0">
             <label class="form-check-label text-dark " for="report{{$report->id}}">
            {{$report->name}}
              </label>
        </span>
    </span>
</div>

@endforeach
</div>
</div>

<div class="row mb-6">
    <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.List of Folders')}}</label>
    <div class="col-lg-8 fv-row row">

@if(count($folders)>0)
@foreach ($folders as $folder)


<div class=" col-lg-4 col-6 form-check form-check-custom align-items-start pt-4 form-check">
    <input class="form-check-input me-3" type="checkbox" name="folders[]" value="{{$folder->id}}" id="folder{{$folder->id}}"  @if(in_array($folder->id,$folders_id)) checked @endif/>
    <span class="form-check-label text-dark d-flex flex-column align-items-start">
        <span class="fw-bold fs-5 mb-0">
             <label class="form-check-label text-dark " for="report{{$folder->id}}">
            {{$folder->name}}
              </label>
        </span>
    </span>
</div>

@endforeach
@endif

</div>
</div>



</div>

<div class="card-footer d-flex justify-content-end py-6 px-9">
    <!-- <button type="reset" class="btn btn-secondary btn-active-light-primary me-2">{{__('messages.Cancel')}}</button> -->
    <button type="submit" class="btn btn-danger" id="kt_account_profile_details_submit">{{__('messages.Edit')}}</button>
</div>


</form>
</div>
@endsection

