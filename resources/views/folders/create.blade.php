@extends("layouts.template")
@section("module",__('messages.Folder Management'))
@section("descmodule",__('messages.Add a New Folder'))
@section("btnright")
    <a href="{{route('folders.index')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.List of Folders')}}
    </a>
@endsection
@section("content")

<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2>  {{__('messages.Add a New Folder')}} </h2>
    </div>
</div>

<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6 m-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 "> {{__('messages.This form allows you to quickly and efficiently create new Folder.')}}</div>
            </div>

        </div>
    </div>
<div id="kt_account_settings_profile_details" class="collapse show">

<form action="{{route("folders.store")}}" class="form" method="POST">
    @csrf
    <div class="card-body border-top p-9">
        <div class="row mb-6">
<label class="col-lg-3 col-form-label required fw-semibold fs-6" for="name">{{__('messages.Folder Name')}}

</a></label>
<div class="col-lg-8 fv-row">
<input class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="{{__('messages.Enter the folder name')}}" value="{{ old('name') }}" type="text" name="name" id="name" required>

@error('name')
<div class="text-danger mt-3">{{$message}}</div>
@enderror
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

