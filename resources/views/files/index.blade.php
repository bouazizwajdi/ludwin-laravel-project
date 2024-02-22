
@extends("layouts.template")
@section("module",__('messages.Excel Files Management'))
@section("descmodule",__('messages.List of Excel'))
@section("btnright")
    <a href="{{route('excels.create')}}" class="btn btn-sm fw-bold btn-dark">
        {{__('messages.Add File')}}
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
        <th>{{__('messages.Excel File Name')}}</th>
        <th> {{__('messages.Excel File')}}</th>
        <th> {{__('messages.Folder')}}</th>
        <th> {{__('messages.Creation Date')}}</th>
        <th>{{__('messages.Actions')}}</th>
    </tr>
</thead>
<tbody>

@foreach ($files as $file)

<tr>

<td>
    {{$file->name}}
</td>
<td>
    <a href="{{asset('files/excels/'.$file->file)}}" Target=_blank class="text-center">
        <img src="{{ asset('images/excel.png')}}" alt="{{ $file->name }}">
    </a>
</td>
<td>
    {{$file->folder->name}}
</td>
<td>
    {{$file->created_at}}
</td>


<td>

    <a href="#" class="btn btn-sm btn-danger btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{__('messages.Actions')}}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
      </a>
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

        <div class="menu-item px-3">
          <a  title="Modifier" href="{{route("excels.edit",$file->id)}}" class="menu-link px-3">
            {{__('messages.Edit')}}
          </a>
        </div>
        <div class="menu-item btn-supprimer px-3">
            <form method="POST" action="{{route("excels.destroy",$file->id)}}">
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
