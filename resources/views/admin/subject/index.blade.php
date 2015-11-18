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
        <h2>Manage Subject</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Subject</strong>
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
        <a href="{{route('admin.subject.edit')}}" class="btn btn-primary pull-right">Add Subject</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-subject dataTable dtr-inline">
            <thead>
                <tr>
                    <th>{{trans('admin/subject_index.id')}}</th>
                    <th>{{trans('admin/subject_index.name')}}</th>
                    <th>{{trans('admin/subject_index.edit')}}</th>
                    <th>{{trans('admin/subject_index.delete')}}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{$i++ + $id}}</td>
                    <td>{{$subject->name}}</td>
                    <td><a href="{{route('admin.subject.edit',['id'=>$subject->id])}}"
                           class="btn btn-info">{{trans('admin/subject_index.edit')}}</a></td>
                    <td><a
                            onclick="confirmDelete(this)" url="{{route('admin.subject.delete',['id'=>$subject->id])}}"
                            class="btn btn-danger">{{trans('admin/subject_index.delete')}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $subjects->render() !!} @endsection @section('script') @parent
<!-- Data Tables -->
<script
src="{{asset('backend/theme/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script
src="{{asset('backend/theme/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('backend/js/subject/index.js')}}"></script>
@endsection
