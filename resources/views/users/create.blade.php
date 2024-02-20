


@extends("layouts.template")
@section("module",__('messages.User Management'))
@section("descmodule",__('messages.Add users'))
@section("btnright")
    <a href="{{route('users.index')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.List of Users')}}
    </a>
@endsection
@section("content")
<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2> {{__('messages.Add a New User')}} </h2>
    </div>
</div>
<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed m-6 p-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 ">{{__('messages.This form allows you to quickly and efficiently create new users and assign reports to them.')}} </div>
            </div>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">


<form action="{{ route('users.store') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf

    <div class="card-body border-top p-9">
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.Name & Surname')}} </label>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        <input type="text"  class="form-control form-control-lg  mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" placeholder="{{__('messages.Enter the name')}}" value="{{ old('first_name') }}" name="first_name" id="first_name" required />
                        @error('first_name')
                        <div class="text-danger mt-3">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 fv-row">
                        <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" placeholder="{{__('messages.Enter the surname')}}" value="{{ old('last_name') }}" name="last_name" id="last_name" required/>
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                       @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6" for="company_name">  {{__('messages.Company Name')}} </label>
            <div class="col-lg-8 fv-row">
                <input type="text" class="form-control form-control-lg  " placeholder=" {{__('messages.Enter the company name')}}" value="{{ old('company_name') }}" name="company_name" id="company_name"/>
            </div>
        </div>


        <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-semibold fs-6">
                <span class="required">{{__('messages.Email')}}</span>
            </label>
            <div class="col-lg-8 fv-row">
                <input type="tel" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror " placeholder="{{__('messages.Enter email')}}" value="{{ old('email') }}" required
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
                <input type="tel" name="phone" class="form-control form-control-lg  " placeholder="{{__('messages.Enter the phone number')}}"  value="{{ old('phone') }}" id="phone"/>
            </div>
        </div>



    <div class="row mb-6">
        <label for="password" class="col-lg-3 col-form-label fw-semibold fs-6 required" >{{ __('messages.Password') }}</label>

        <div class="col-lg-8 fv-row">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="{{__('messages.Enter password')}}" required autocomplete="new-password">
                <div class ="alert-info p-2 rounded border border-1 mt-1">{{__('messages.The password must be at least 8 characters')}}</div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-6">
        <label for="password-confirm" class="col-lg-3 col-form-label fw-semibold fs-6 required">{{ __('messages.Confirm Password') }}</label>

        <div class="col-lg-8 fv-row">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            placeholder="{{__('messages.Enter password confirmation')}}" autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-6">
        <label class="col-lg-3 col-form-label required fw-semibold fs-6 " for="role">{{ __('messages.Role') }}</label>
        <div class="col-lg-8 fv-row">
            <select name="role" aria-label="Select a Role" id="role" data-control="select2" data-placeholder="--- {{ __('messages.Choose') }} ---" class="form-select  form-select-lg fw-semibold  @error('role') is-invalid @enderror">
                <option value="">--- {{ __('messages.Choose') }} ---</option>
                <option value="admin"  {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
            </select>
            @error('role')
            <div class="text-danger mt-3">{{$message}}</div>
             @enderror
        </div>
    </div>



    <div class="row mb-6 role">
        <label class="col-lg-3 col-form-label required fw-semibold fs-6" for="group_id" >{{ __('messages.Group') }}</label>
        <div class="col-lg-8 fv-row">
        <select aria-label="Select a Role" data-control="select2" data-placeholder="--- {{ __('messages.Choose') }} ---" class="form-select form-select-lg fw-semibold getreport @error('group_id') is-invalid @enderror" id="group_id" name="group_id">
            <option value="">--- {{ __('messages.Choose') }} ---</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id}}">{{ $group->name }}</option>
            @endforeach
        </select>
         @error('group_id')
    <div class="text-danger mt-3">{{$message}}</div>
         @enderror
    </div>
    </div>

        <div id="reports" class="d-none"></div>

</div>

<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-secondary btn-active-light-primary me-2">{{__('messages.Cancel')}}</button>
    <button type="submit" class="btn btn-danger" id="kt_account_profile_details_submit">{{__('messages.Add')}}</button>
</div>



</form>
    </div>
</div>
@endsection
