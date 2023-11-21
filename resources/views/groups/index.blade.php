@extends("layouts.template")
@section("module",__('messages.Group Management'))
@section("descmodule",__('messages.List of Groups'))
@section("btnright")
    <a href="{{route('groups.create')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Add Group')}}
    </a>
@endsection
@section("content")
@if (Session::has("success"))
<div class="alert alert-success mt-5">{{Session::get("success")}}</div>
@endif
<div class="card-body pt-0">


    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
<thead>
    <tr class="fw-bold fs-6 text-gray-800 px-7">
        <th>{{__('messages.Group Name')}}</th>
        <th> {{__('messages.Creation Date')}}</th>
        <th>{{__('messages.Actions')}}</th>
    </tr>
</thead>
<tbody>

@foreach ($groups as $group)

<tr>

<td>
    {{$group->name}}
</td>
<td>
    {{$group->created_at}}
</td>


<td>

    <a href="#" class="btn btn-sm btn-danger btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{__('messages.Actions')}}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
      </a>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

        <div class="menu-item px-3">
          <a  title="Modifier" href="{{route("groups.edit",$group->id)}}" class="menu-link px-3">
            {{__('messages.Edit')}}
          </a>
        </div>
        <div class="menu-item btn-supprimer px-3">
            <form method="POST" action="{{route("groups.destroy",$group->id)}}">
                @csrf
                @method("delete")
          <button type="submit"  onclick="return confirm('{{__('messages.Are you sure you want to delete?')}}');" class="menu-link  px-3" data-kt-customer-table-filter="Supprimer_row">
            {{__('messages.Delete')}}
          </button>

        </form>
        </div>
      </div>

</td>

</tr>
 @endforeach

</tbody>

</table>
</div>
@endsection
