
@extends("layouts.template")
@section("module",__('messages.User Management'))
@section("descmodule",__('messages.List of Users'))
@section("btnright")
    <a href="{{route('users.create')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Add User')}}
    </a>
@endsection
@section("content")
@if (Session::has("success"))
<div class="alert alert-success mt-5">{{Session::get("success")}}</div>
@endif
<div class="card-body pt-0">


    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
<thead>
    <tr>
        <th class="min-w-125px">{{__('messages.Username')}} </th>
        <th class="min-w-125px">{{__('messages.Email')}} </th>
        <th class="min-w-125px">{{__('messages.Group')}} </th>
        <th class="min-w-125px"> {{__('messages.Creation Date')}} </th>
        <th class="min-w-70px">{{__('messages.Actions')}}</th>
    </tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>

<td>
    {{$user->first_name}}   {{$user->last_name}}
</td>
<td>
    {{$user->email}}
</td>
<td>
  @if(!empty($user->group))  {{$user->group->name}} @endif
</td>
<td>
    {{$user->created_at}}
</td>
<td>

    <a href="#" class="btn btn-sm btn-danger btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{__('messages.Actions')}}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
      </a>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

        <div class="menu-item px-3">
          <a  title="Modifier" href="{{route("users.edit",$user->id)}}" class="menu-link px-3">
            {{__('messages.Edit')}}
          </a>
        </div>
        <div class="menu-item btn-supprimer px-3">
            <form method="POST" action="{{route("users.destroy",$user->id)}}">
                @csrf
                @method("delete")

          <button type="submit"  onclick="return confirm('{{__('messages.Are you sure you want to delete?')}}');"  class="menu-link px-3" data-kt-customer-table-filter="Supprimer_row">
            {{__('messages.Delete')}}
          </button>

        </form>
        </div>
      </div>

</td>

</tr>
@empty
<tr><td colspan="2">{{__('messages.no user at the moment')}}</td></tr>
 @endforelse
</tbody>

</table>
</div>

@endsection
