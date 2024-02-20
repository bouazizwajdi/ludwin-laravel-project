
@extends("layouts.template")
@section("module",__('messages.User Management'))
@section("descmodule",__('messages.Edit users'))
@section("btnright")
    <a href="{{route('users.index')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.List of Users')}}
    </a>
@endsection
@section("content")

<div class="card-header pt-7" id="kt_chat_contacts_header">
    <div class="card-title">
        <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        <h2>{{__('messages.Edit user')}}</h2>
    </div>
</div>
<div class="card mb-5 mb-xl-10">
    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed m-6 p-6">
        <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
        <div class="d-flex flex-stack flex-grow-1 ">
            <div class=" fw-semibold">
                <div class="fs-6 text-gray-700 ">{{__('messages.This form allows you to quickly edit a user\'s and these reports')}}</div>
            </div>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">


<form action="{{route("users.update",$user->id)}}" method="POST" class="form" enctype="multipart/form-data">
    @method("PUT")
    @csrf


    <div class="card-body border-top p-9">
        <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.Name & Surname')}} </label>
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
                <input type="tel" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email',$user->email)}}" required
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

    <div class="row mb-6">
        <label class="col-lg-3 col-form-label required fw-semibold fs-6" for="role">{{__('messages.Role')}}</label>
        <div class="col-lg-8 fv-row">
            <select name="role" aria-label="Select a Role" data-control="select2" data-placeholder="--- Choissir ---" id="role" class="form-select  form-select-lg fw-semibold  @error('role') is-invalid @enderror">
                <option  {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }} value="admin"> Admin</option>
                <option  {{ (old('role', $user->role) == 'client') ? 'selected' : '' }} value="client">Client</option>
            </select>
            @error('role')
            <div class="text-danger mt-3">{{$message}}</div>
             @enderror
        </div>
    </div>


<div class="role @if($user->role=='admin') d-none @endif">
    <div class="row mb-6">
        <label class="col-lg-3 col-form-label required fw-semibold fs-6" for="group_id" >{{__('messages.Group')}}</label>
        <div class="col-lg-8 fv-row">
        <select aria-label="Select a Role" data-control="select2" data-placeholder="--- {{ __('messages.Choose') }} ---" class="form-select form-select-lg fw-semibold getreport @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
            @foreach ($groups as $group)
                <option  value="{{$group->id}}"  @if (($user->group_id)==($group->id)) selected @endif>{{ $group->name }}</option>
            @endforeach
        </select>
         @error('group_id')
    <div class="text-danger mt-3">{{$message}}</div>
         @enderror
    </div>
    </div>

        <div id="reports" class="d-none">
            <div class="row mb-6">
                <label class="col-lg-3 col-form-label required fw-semibold fs-6">{{__('messages.List of Reports')}}</label>
                <div class="col-lg-8 fv-row row">
                    @if(count($reports)>0)
                    @foreach ($reports as $report)

                    <div class="col-lg-4 form-check form-check-custom align-items-start pt-4">
                        <input class="form-check-input" type="checkbox" name="reports[]" value="{{$report->id}}" id="report{{$report->id}}" @if(in_array($report->id,$reprts_id)) checked @endif>
                        <span class="form-check-label d-flex flex-column align-items-start"><label class="form-check-label text-dark fw-bold fs-5 mb-0" for="report{{$report->id}}">
                      {{$report->name}}
                        </label>
                    </span>
                    </div>



                    @endforeach
                    @endif
                </div>
             </div>
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-end py-6 px-9">
    {{-- <button type="reset" class="btn btn-secondary btn-active-light-primary me-2">{{__('messages.Cancel')}}</button> --}}
    <button type="submit" class="btn btn-danger" id="kt_account_profile_details_submit">{{__('messages.Edit')}}</button>
</div>


</form>
    </div>
</div>
@endsection
