
@extends("layouts.template")
@section("module",__('messages.My profile'))
@section("descmodule",__('messages.Edit profile'))

@section("content")

<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2>  {{__('messages.Edit my profile')}} </h2>
    </div>
</div>
<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed m-6 p-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 ">{{__('messages.This form allows you to quickly modify your profile')}}</div>
            </div>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">


<form action="{{route("users.updateprofil",$user->id)}}" method="POST" class="form" enctype="multipart/form-data">
    @method("PUT")
    @csrf


    <div class="card-body border-top p-9">
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.Name & Surname')}}</label>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        <input type="text"  class="form-control form-control-lg  mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" value="{{old('first_name',$user->first_name)}}"  name="first_name" id="first_name" required />
                        @error('first_name')
                        <div class="text-danger mt-3">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 fv-row">
                        <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" value="{{old('last_name',$user->last_name)}}" name="last_name" id="last_name" required/>
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                       @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6" for="company_name">{{__('messages.Company Name')}}</label>
            <div class="col-lg-8 fv-row">
                <input type="text" class="form-control form-control-lg" value="{{old('company_name',$user->company_name)}}" name="company_name" id="company_name"/>
            </div>
        </div>


        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6">
                <span class="required">{{__('messages.Email')}}</span>
            </label>
            <div class="col-lg-8 fv-row">
                <input type="tel" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{$user->email}}" required
                autocomplete="email" />
                @error('email')
                <div class="text-danger mt-3">{{$message}}</div>
               @enderror
            </div>
        </div>


        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6">
                <span  for="phone">{{__('messages.Phone')}}</span>
            </label>
            <div class="col-lg-8 fv-row">
                <input type="tel" name="phone" class="form-control form-control-lg"  value="{{old('phone',$user->phone)}}"  id="phone"/>
            </div>
        </div>



    <div class="row mb-6">
        <label for="password" class="col-lg-3 col-form-label fw-semibold fs-6">{{ __('messages.Password') }}</label>

        <div class="col-lg-8 fv-row">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password"  autocomplete="new-password">
                <div class ="alert-info p-2 rounded border border-1 mt-1">{{__('messages.The password must be at least 8 characters')}}</div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-6">
        <label for="password-confirm" class="col-lg-3 col-form-label fw-semibold fs-6">{{ __('messages.Confirm Password') }}</label>

        <div class="col-lg-8 fv-row">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                autocomplete="new-password">
        </div>
    </div>

</div>

<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-secondary btn-active-light-primary me-2">{{__('messages.Cancel')}}</button>
    <button type="submit" class="btn btn-danger" id="kt_account_profile_details_submit">{{__('messages.Edit')}}</button>
</div>


</form>
    </div>
</div>
@endsection
