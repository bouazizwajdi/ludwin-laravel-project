
@extends("layouts.template")
@section("module",__('messages.Report Management'))
@section("descmodule", __('messages.Add BI Reports'))
@section("btnright")
    <a href="{{route('reports.index')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.List of Reports')}} </a>
@endsection
@section("content")

<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2> {{__('messages.Add a New Report')}} </h2>
    </div>
</div>
<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6 m-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 ">{{__('messages.This form allows you to quickly create new reports.')}} </div>
            </div>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">

<form action="{{route("reports.store")}}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <div class="card-body border-top p-9">

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6" for="name">{{__('messages.Report Name')}}</label>
            <div class="col-lg-8 fv-row">
                <input class="form-control form-control-lg  @error('name') is-invalid @enderror" placeholder="{{__('messages.Enter report name')}}" value="{{ old('name') }}" type="text" name="name" id="name" required>
        @error('name')
        <div class="text-danger mt-3">{{$message}}</div>
        @enderror
            </div>
        </div>


        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6" for="logo">{{__('messages.Logo')}}</label>
            <div class="col-lg-8 fv-row">
                <input class="form-control form-control-lg @error('logo') is-invalid @enderror" type="file" name="logo" id="logo">
                @error('logo')
                 <div class="text-danger mt-3">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6" for="integration_code">{{__('messages.Integration Code')}}</label>
            <div class="col-lg-8 fv-row">
                <div class ="alert-danger p-2 rounded border mb-1 border-1"><b>{{__('messages.Change the width')}}</b></div>
                <textarea class="form-control  @error('integration_code') is-invalid @enderror" id="integration_code" name="integration_code" rows="3" >{{ old('integration_code') }}</textarea>
                @error('integration_code')
                 <div class="text-danger mt-3">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6" for="description">{{__('messages.Description')}}</label>
            <div class="col-lg-8 fv-row">
                <textarea class="form-control" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
            </div>
        </div>


    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-secondary btn-active-light-primary me-2">{{__('messages.Cancel')}}</button>
        <button type="submit" class="btn btn-danger" id="kt_account_profile_details_submit">{{__('messages.Add')}}</button>
    </div>

</form>

</div>
</div>

@endsection
