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
        <h2>Manage Student</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Student</strong>
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
        <a href="{{route('admin.student.edit')}}" class="btn btn-primary pull-right">Add Student</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-student dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/student_index.id')}}</th>
                    <th>{{trans('admin/student_index.name')}}</th>
                    <th>{{trans('admin/student_index.birth_day')}}</th>
                    <th>{{trans('admin/student_index.gender')}}</th>
                    <th>{{trans('admin/student_index.ethnic')}}</th>
                    <th>{{trans('admin/student_index.religion')}}</th>
                    <th>{{trans('admin/student_index.native_place')}}</th>
                    <th>Status</th>
                    <th>{{trans('admin/student_index.edit')}}</th>
                    <th>{{trans('admin/student_index.delete')}}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>                
                @foreach($students as $student)
                <tr>
                    <td>{{++$i + $id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->birth_day}}</td>
                    <td>{{$student->gender?trans('admin/student_index.female'):trans('admin/student_index.male')}}</td>
                    <td>{{$student->ethnic}}</td>
                    <td>{{$student->religion}}</td>
                    <td>{{$student->native_place}}</td>
                    <td>{{$student->status?"Learning":"Stop"}}</td>
                    <td><a href="{{route('admin.student.edit',['id'=>$student->id])}}"
                           class="btn btn-info">{{trans('admin/student_index.edit')}}</a></td>
                    <td><a
                             onclick="confirmDelete(this)" url="{{route('admin.student.delete',['id'=>$student->id])}}"
                            class="btn btn-danger">{{trans('admin/student_index.delete')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $students->render() !!} @endsection @section('script') @parent
<!-- Data Tables -->
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/student/index.js')}}"></script>
@endsection
