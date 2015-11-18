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
@endsection 
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Award</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Award</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection
<!-- end section top -->
@section('content')
<div clas="row ibox float-e-margins">
    <div class="ibox-title">
        <h5>List Detail</h5>
        <a href="{{route('admin.award.edit')}}" class="btn btn-primary pull-right">Add Award</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-award dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Student</th>
                    <th>Award</th>
                    <th>Priod</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>                
                @foreach($awards as $award)
                <tr>
                    <td>{{++$i + $id}}</td>
                    <td>{{$award->student->name}}</td>
                    <td>{{mb_strlen($award->content)<30?$award->content:mb_substr($award->content,0,30)."..."}}</td>
                    <td>{{$award->priod->name}}</td>
                    <td><a href="{{route('admin.award.edit',['id'=>$award->id])}}"
                           class="btn btn-info">Edit</a></td>
                    <td><a
                           onclick="confirmDelete(this)" url="{{route('admin.award.delete',['id'=>$award->id])}}"
                            class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $awards->render() !!}
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
<script src="{{asset('backend/js/award/index.js')}}"></script>
@endsection
