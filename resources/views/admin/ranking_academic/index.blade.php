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
@endsection 
<!-- section top -->
@section('top')
@parent
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Ranking Academic</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.home.index')}}">Home</a>
            </li>          
            <li class="active">
                <strong>Ranking Academic</strong>
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
        <a href="{{route('admin.rankingacademic.edit')}}" class="btn btn-primary pull-right">Add Ranking Academic</a>
    </div>
    <div class="ibox-content">
        <table
            class="table  table-bordered table-hover dataTables-rankingacademic dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>                
                @foreach($rankingAcademics as $rankingAcademic)
                <tr>
                    <td>{{++$i +$id}}</td>
                    <td>{{$rankingAcademic->name}}</td>
                    <td><a href="{{route('admin.rankingacademic.edit',['id'=>$rankingAcademic->id])}}"
                           class="btn btn-info">Edit</a></td>
                    <td><a onclick="confirmDelete(this)" url="{{route('admin.rankingacademic.delete',['id'=>$rankingAcademic->id])}}"
                           class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $rankingAcademics->render() !!} 
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
<script src="{{asset('backend/js/ranking_academic/index.js')}}"></script>
@endsection
