
@extends("layouts.template")
@section("module",__('messages.Report Management'))
@section("descmodule",__('messages.List Reports'))
@section("btnright")
    <a href="{{route('reports.create')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Add Report')}}
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
        <th class="min-w-125px">{{__('messages.Report Name')}}</th>
        <th class="min-w-125px">{{__('messages.Logo')}}</th>
        <th class="min-w-125px">{{__('messages.Description')}}</th>
        <th class="min-w-125px">{{__('messages.Creation Date')}}</th>
        <th class="min-w-70px">{{__('messages.Actions')}}</th>
    </tr>
</thead>
<tbody>
@foreach ($reports as $report)

<tr>
<td>
    {{$report->name}}
</td>
<td>
    @if((!empty($report->logo))&&(!File::exists(asset('files/reports/'.$report->logo))))
    <img src="{{asset('files/reports/'.$report->logo)}}" width="100">
    @endif
</td>

<td>
    {{$report->description}}
</td>
<td>
    {{$report->created_at}}
</td>
<td>
    <a href="#" class="btn btn-sm btn-danger btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{__('messages.Actions')}}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
      </a>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
        <div class="menu-item px-3">
            <a title="Visualiser" href="{{route("reports.show",$report->id)}}" class="menu-link px-3">
                {{__('messages.View')}}
          </a>
        </div>
        <div class="menu-item px-3">
            <a title="Modifier" href="{{route("reports.edit",$report->id)}}" class="menu-link px-3">
                {{__('messages.Edit')}}
          </a>
        </div>
        <div class="menu-item btn-supprimer px-3">
            @if(count($report->groups)==0 && count($report->users)==0  )
            <form method="POST" action="{{route("reports.destroy",$report->id)}}">
                @csrf
                @method("delete")
         <button type="submit"  onclick="return confirm('{{__('messages.Are you sure you want to delete?')}}');" class="menu-link  px-3" data-kt-customer-table-filter="Supprimer_row">
            {{__('messages.Delete')}}
          </button>

                </form>
        @endif
        </div>
      </div>


</td>

</tr>

 @endforeach
</tbody>

</table>
</div>
@endsection
