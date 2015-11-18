@extends('layouts/main_layout')
@section('css')
@parent
<!-- Data Tables -->
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.bootstrap.css')}}"
    rel="stylesheet">
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.responsive.css')}}"
    rel="stylesheet">
<link
    href="{{asset('backend/theme/css/plugins/dataTables/dataTables.tableTools.min.css')}}"
    rel="stylesheet">
<link href="{{asset('backend/css/common/datatable.css')}}"
      rel="stylesheet">
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Priod</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Priod</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->
@endsection 
@section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>List Detail</h5>
        <a href="{{route('admin.priod.edit')}}" class="btn btn-primary pull-right">Add priod</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-priod dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/priod_index.id')}}</th>
                    <th>{{trans('admin/priod_index.name')}}</th>
                    <th>{{trans('admin/priod_index.date_begin')}}</th>
                    <th>{{trans('admin/priod_index.date_end')}}</th>
                    <th>{{trans('admin/priod_index.edit')}}</th>
                    <th>{{trans('admin/priod_index.delete')}}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($priods as $priod)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$priod->name}}</td>
                    <td>{{$priod->date_begin}}</td>
                    <td>{{$priod->date_end}}</td>
                    <td><a href="{{route('admin.priod.edit',['id'=>$priod->id])}}"
                           class="btn btn-info">{{trans('admin/priod_index.edit')}}</a></td>
                    <td><a  onclick="confirmDelete(this)" url="{{route('admin.priod.delete',['id'=>$priod->id])}}"
                           class="btn btn-danger">{{trans('admin/priod_index.delete')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $priods->render() !!} 
@endsection
@section('script')
@parent
<!-- Data Tables -->
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/priod/index.js')}}"></script>
@endsection
