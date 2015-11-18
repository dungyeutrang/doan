@extends('layouts/main_layout') @section('css') @parent
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
        <h2>Manage Teacher</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Teacher</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->
@endsection @section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>List Detail</h5>
        <a href="{{route('admin.teacher.edit')}}" class="btn btn-primary pull-right">Add Teacher</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-student dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/teacher_index.id')}}</th>
                    <th>{{trans('admin/teacher_index.name')}}</th>
                    <th>{{trans('admin/teacher_index.birth_day')}}</th>
                    <th>{{trans('admin/teacher_index.gender')}}</th>
                    <th>{{trans('admin/teacher_index.identity_number')}}</th>
                    <th>{{trans('admin/teacher_index.native_place')}}</th>
                    <th>{{trans('admin/teacher_index.edit')}}</th>
                    <th>{{trans('admin/teacher_index.delete')}}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{++$i + $id}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->birth_day}}</td>
                    <td>{{$teacher->gender?trans('admin/teacher_index.female'):trans('admin/teacher_index.male')}}</td>
                    <td>{{$teacher->identity_number}}</td>
                    <td>{{$teacher->native_place}}</td>
                    <td><a href="{{route('admin.teacher.edit',['id'=>$teacher->id])}}"
                           class="btn btn-info">{{trans('admin/teacher_index.edit')}}</a></td>
                    <td><a
                            href="{{route('admin.teacher.delete',['id'=>$teacher->id])}}"
                            class="btn btn-danger">{{trans('admin/teacher_index.delete')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $teachers->render() !!} @endsection @section('script') @parent
<!-- Data Tables -->
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/teacher/index.js')}}"></script>
@endsection
