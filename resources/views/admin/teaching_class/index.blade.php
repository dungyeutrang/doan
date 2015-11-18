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
        <h2>Manage Teaching Class</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Teaching Class</strong>
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
        <a href="{{route('admin.teachingclass.edit')}}" class="btn btn-primary pull-right">Add Teaching Class</a>
    </div>
    <div class="ibox-content">
        <table
            class="table table-bordered table-hover dataTables-teachingclass dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/teachingclass_index.id')}}</th>
                    <th>{{trans('admin/teachingclass_index.teacher')}}</th>
                    <th>{{trans('admin/teachingclass_index.subject')}}</th>
                    <th>{{trans('admin/teachingclass_index.class')}}</th>
                    <th>{{trans('admin/teachingclass_index.priod')}}</th>
                    <th>{{trans('admin/teachingclass_index.edit')}}</th>					
                    <th>{{trans('admin/teachingclass_index.delete')}}</th>					
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($teachingClasses as $teachingClass)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$teachingClass->teacherSubject->teacher->name}}</td>
                    <td>{{$teachingClass->teacherSubject->subject->name}}</td>
                    <td>{{$teachingClass->classModel->name}}</td>					
                    <td>{{$teachingClass->classModel->priod->name}}<b>({{date_format(date_create($teachingClass->classModel->priod->date_begin),"m/Y")."-".date_format(date_create($teachingClass->classModel->priod->date_end),"m/Y")}})</b></td>
                    <td><a
                            href="{{route('admin.teachingclass.edit',['id'=>$teachingClass->id])}}"
                            class="btn btn-info">{{trans('admin/teachingclass_index.edit')}}</a></td>
                    <td><a
                            href="{{route('admin.teachingclass.delete',['id'=>$teachingClass->id])}}"
                            class="btn btn-danger">{{trans('admin/teachingclass_index.delete')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $teachingClasses->render() !!} 
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
<script src="{{asset('backend/js/teachingclass/index.js')}}"></script>
@endsection
