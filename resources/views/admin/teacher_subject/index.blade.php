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
        <h2>Manage Teacher Subject</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Teacher Subject</strong>
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
        <a href="{{route('admin.teachersubject.edit')}}" class="btn btn-primary pull-right">Add Teacher Subject</a>
    </div>
    <div class="ibox-content">
        <table
            class="table table-bordered table-hover dataTables-teachersubject dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/teachersubject_index.id')}}</th>
                    <th>{{trans('admin/teachersubject_index.teacher')}}</th>
                    <th>{{trans('admin/teachersubject_index.subject')}}</th>
                    <th>{{trans('admin/teachersubject_index.edit')}}</th>					
                    <th>{{trans('admin/teachersubject_index.delete')}}</th>					
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($teacherSubjects as $teachersubject)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$teachersubject->teacher->name}}</td>
                    <td>{{$teachersubject->subject->name}}</td>
                    <td><a
                            href="{{route('admin.teachersubject.edit',['id'=>$teachersubject->id])}}"
                            class="btn btn-info">{{trans('admin/teachersubject_index.edit')}}</a></td>
                    <td><a
                            onclick="confirmDelete(this)" url="{{route('admin.teachersubject.delete',['id'=>$teachersubject->id])}}"
                            class="btn btn-danger">{{trans('admin/teachersubject_index.delete')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $teacherSubjects->render() !!} 
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
<script src="{{asset('backend/js/teachersubject/index.js')}}"></script>
@endsection
